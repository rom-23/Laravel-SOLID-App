<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Http\Validation\ReservationValidation;
use App\Models\Menu;
use App\Models\Reservations;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use App\Repositories\ReservationRepositoryInterface;
use App\Repositories\TableRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class ReservationController extends Controller
{
    public Reservations $reservation;
    protected ReservationRepositoryInterface $reservationRepository;
    protected TableRepositoryInterface $tableRepository;

    /**
     * @param ReservationRepositoryInterface $reservationRepository
     * @param TableRepositoryInterface $tableRepository
     * @param Reservations $reservation
     */
    public function __construct(ReservationRepositoryInterface $reservationRepository,
                                TableRepositoryInterface       $tableRepository,
                                Reservations                   $reservation)
    {
        $this->reservation = $reservation;
        $this->reservationRepository = $reservationRepository;
        $this->tableRepository = $tableRepository;
    }

    /**
     * @param ReservationStoreRequest $request
     * @param ReservationValidation $validation
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReservationStoreRequest $request, ReservationValidation $validation): JsonResponse
    {
//        $validator = Validator::make($request->all(), $validation->Rules(), $validation->Messages());
//        if ($validator->fails()) {
//            return response()->json(['errors' => $validator->errors()], 401);
//        }
        if (!empty($this->reservationRepository->store($request))) {
            return response()->json(['errors' => $this->reservationRepository->store($request)['message']], 401);
        }

        return response()->json(['success' => 'Saved in database', 200]);
    }

}
