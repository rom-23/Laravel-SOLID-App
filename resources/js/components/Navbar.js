import React, {Component} from "react";
import ReactDOM from "react-dom";
import {Navigate} from "react-router-dom";

class Navbar extends React.Component {
    constructor(props) {
        super(props);
        this.state = {};
    }

    componentDidMount() {
    }

    render() {
        return (
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
                        <a className="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                           href="#">Home</a>
                        <a className="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                           href="#">Login</a>
                        <a className="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                           href="#">Our Menu</a>
                        <a className="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                           href="#">Make Reservation</a>
                    </div>
                </nav>
            </div>
        )
    }
}


export default Navbar;
