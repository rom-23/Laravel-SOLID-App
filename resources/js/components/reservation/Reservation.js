import React, {Component} from "react";
import ReactDOM from "react-dom";
import {Navigate} from "react-router-dom";

class Reservation extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            first_name: "",
            last_name: "",
            email: "",
            tel_number: false,
            res_date: "",
            guest_number: "",
            tables_id: '',
            tables: [],
            redirect: false,
            errors: [],
        };
    }

    componentDidMount() {
        axios.get('http://127.0.0.1:8000/api/tables/all')
            .then(res => {
                console.log(res.data);
                this.setState({tables: res.data})
            })
            .catch(error => {
                console.log(error.response);
            })
    };

    handleFirstNameChange = (event) => {
        this.setState({first_name: event.target.value}, () => {
            console.log(this.state);
        });
    };

    handleLastNameChange = (event) => {
        this.setState({last_name: event.target.value}, () => {
            console.log(this.state);
        });
    };

    handleEmailChange = (event) => {
        this.setState({email: event.target.value}, () => {
            console.log(this.state);
        });
    };

    handleTelNumberChange = (event) => {
        this.setState({tel_number: event.target.value}, () => {
            console.log(this.state);
        });
    };

    handleResDateChange = (event) => {
        this.setState({res_date: event.target.value}, () => {
            console.log(this.state);
        });
    };

    handleGuestNumberChange = (event) => {
        this.setState({guest_number: event.target.value}, () => {
            console.log(this.state);
        });
    };

    handleTableChange = (event) => {
        this.setState({tables_id: event.target.value}, () => {
            console.log(this.state);
        });
    }

    handleSubmit = (event) => {
        event.preventDefault();
        let bodyFormData = new FormData();
        bodyFormData.set("first_name", this.state.first_name);
        bodyFormData.set("last_name", this.state.last_name);
        bodyFormData.set("email", this.state.email);
        bodyFormData.set("tel_number", this.state.tel_number);
        bodyFormData.set("res_date", this.state.res_date);
        bodyFormData.set("guest_number", this.state.guest_number);
        bodyFormData.set("tables_id", this.state.tables_id);
        let headers = {
            headers: {
                "API-TOKEN": localStorage.getItem("token")
            }
        };
        axios.post('http://127.0.0.1:8000/api/reservations/new', bodyFormData, headers)
            .then((response) => {
                console.log(response.data);
                this.setState({redirect: true});
            })
            .catch((error) => {
                if (error.response.status === 401) {
                    this.setState({errors: error.response.data.errors}, () => {
                        console.log(this.state);
                    });
                }
            })
    }

    render() {
        if (this.state.redirect) {
            return (<Navigate to="/"/>);
        }
        return (
            <>
                <div
                    className="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                    id={"createModal"} tabIndex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                    <div className="modal-dialog relative w-auto pointer-events-none">
                        <div
                            className="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                            <div
                                className="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                <h5 className="text-xl font-medium leading-normal text-gray-800"
                                    id="exampleModalLabel2">Modal title</h5>
                                <button type="button"
                                        className="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                        data-bs-dismiss="modal" aria-label="Close"/>
                            </div>
                            <div className="modal-body relative p-4">
                                <form
                                    className="row g-3"
                                    method="POST"
                                    onSubmit={this.handleSubmit}
                                >
                                    <div className="col-md-4">
                                        <label className="form-label">First Name</label>
                                        <input
                                            type="text"
                                            className={`form-control ${
                                                this.state.errors && this.state.errors.first_name
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            onChange={this.handleFirstNameChange}
                                        />
                                        {this.state.errors && this.state.errors.first_name ? (
                                            <div className="text-danger invalid-feedback">
                                                {this.state.errors["first_name"]}
                                            </div>
                                        ) : (
                                            ""
                                        )}
                                    </div>
                                    <div className="col-md-4">
                                        <label className="form-label">Last Name</label>
                                        <input
                                            type="text"
                                            className={`form-control ${
                                                this.state.errors && this.state.errors.last_name
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            onChange={this.handleLastNameChange}
                                        />
                                        {this.state.errors && this.state.errors.last_name ? (
                                            <div className="text-danger invalid-feedback">
                                                {this.state.errors["last_name"]}
                                            </div>
                                        ) : (
                                            ""
                                        )}
                                    </div>
                                    <div className="col-md-4">
                                        <label className="form-label">Email</label>
                                        <input
                                            type="text"
                                            className={`form-control ${
                                                this.state.errors && this.state.errors.email
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            onChange={this.handleEmailChange}
                                        />
                                        {this.state.errors && this.state.errors.email ? (
                                            <div className="text-danger invalid-feedback">
                                                {this.state.errors["email"]}
                                            </div>
                                        ) : (
                                            ""
                                        )}
                                    </div>
                                    <div className="col-md-4">
                                        <label className="form-label">Tel Number</label>
                                        <input
                                            type="text"
                                            className={`form-control ${
                                                this.state.errors && this.state.errors.tel_number
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            onChange={this.handleTelNumberChange}
                                        />
                                        {this.state.errors && this.state.errors.tel_number ? (
                                            <div className="text-danger invalid-feedback">
                                                {this.state.errors["tel_number"]}
                                            </div>
                                        ) : (
                                            ""
                                        )}
                                    </div>
                                    <div className="col-md-4">
                                        <label className="form-label">Date</label>
                                        <input
                                            type="text"
                                            className={`form-control ${
                                                this.state.errors && this.state.errors.res_date
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            onChange={this.handleResDateChange}
                                        />
                                        {this.state.errors && this.state.errors.res_date ? (
                                            <div className="text-danger invalid-feedback">
                                                {this.state.errors["res_date"]}
                                            </div>
                                        ) : (
                                            ""
                                        )}
                                    </div>
                                    <div className="col-md-4">
                                        <label className="form-label">Guest Number</label>
                                        <input
                                            type="text"
                                            className={`form-control ${
                                                this.state.errors && this.state.errors.guest_number
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            onChange={this.handleGuestNumberChange}
                                        />
                                        {this.state.errors && this.state.errors.guest_number ? (
                                            <div className="text-danger invalid-feedback">
                                                {this.state.errors["guest_number"]}
                                            </div>
                                        ) : (
                                            ""
                                        )}
                                    </div>
                                    <div className="col-md-4">
                                        <select
                                            className={
                                                `border-gray-300 focus:border-indigo-200 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-xl shadow-sm sm:text-sm`
                                            }
                                            name="tables_id"
                                            onChange={this.handleTableChange}
                                        >
                                            {this.state.tables.map((table => {
                                                return (
                                                    <option key={table.id} value={table.id}>
                                                        {table.name}
                                                    </option>
                                                );
                                            }))}
                                        </select>
                                    </div>
                                    <div
                                        className="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                        <button type="button" className="px-6 py-2.5
          bg-purple-600
          text-white
          font-medium
          text-xs
          leading-tight
          uppercase
          rounded
          shadow-md
          hover:bg-purple-700 hover:shadow-lg
          focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0
          active:bg-purple-800 active:shadow-lg
          transition
          duration-150
          ease-in-out" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" className="px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out
      ml-1">Save
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </>
        )
    }
}

export default Reservation;
