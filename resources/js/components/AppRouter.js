import React from "react";
import { BrowserRouter as Routes, Route } from "react-router-dom";
import Login from "./Login";

class AppRouter extends React.Component {
    render() {
        return (
            <Routes>
                <Route exact path="/api/test" element={<Login/>}/>
            </Routes>
        );
    }
}
export default AppRouter;
