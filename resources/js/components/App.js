import React from "react";
import ReactDOM from "react-dom";
import Navbar from './Navbar';
import Menu from './menu/Menu';
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

function App() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <Navbar/>
                <div className="container w-50">
                    <Menu/>
                </div>
            </div>
        </div>
    );
}

export default App;
