import React, {Component} from "react";
import ReactDOM from "react-dom";
import {Switch} from "react-router-dom";
import {Link} from "react-router-dom";
import Reservation from "./reservation/Reservation";
import ViewModal from "./menu/ViewModal";

class Navbar extends React.Component {
    constructor(props) {
        super(props);
        this.state = {};
    }

    componentDidMount() {
    }

    render() {
        return (
            <>
                <div className="bg-white shadow-md" x-data="{ isOpen: false }">
                    <nav className="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
                        <div className="flex items-center justify-between">
                            <a className="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
                               href="#">
                                TailFood
                            </a>
                        </div>
                        <div
                            className="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
                            <Link
                                className="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                                to="/">Home</Link>
                            <a className="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                               href="#">Login</a>
                            <a className="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                               href="#">Our Menu</a>
                            <div>
                                <button type="button"
                                        className="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                        data-bs-toggle="modal" data-bs-target={"#createModal"}
                                >
                                    Make Reservation
                                </button>
                                <Reservation/>
                            </div>
                        </div>
                    </nav>
                </div>
            </>
        )
    }
}


export default Navbar;
