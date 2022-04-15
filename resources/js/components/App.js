import React, {useEffect, useState} from "react";
import ReactDOM from "react-dom";
import Navbar from './Navbar';
import Menu from './menu/Menu';
import Reservation from "./reservation/Reservation";
import AppRouter from "./AppRouter";
import {BrowserRouter as Router} from "react-router-dom";
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

function App() {
    const [views, setViews] = useState(0);

    useEffect(() => {
        const incrementViews = () => {
            setViews((v) => v + 1);
        };
        incrementViews();
    }, []);

    return (
        <Router>
        <div className="container">
            <div className="row justify-content-center">
                <Navbar/>
                <div className="container w-50">
                    <Menu/>
                    <Reservation/>
                </div>
            </div>
        </div>
        </Router>
    );
}

export default App;
