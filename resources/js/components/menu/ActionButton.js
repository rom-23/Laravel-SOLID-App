import React, {Component} from "react";
import ReactDOM from "react-dom";
import ViewModal from "./ViewModal";

class ActionButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            menus: []
        };
    }

    componentDidMount() {
    }


    render() {
        return (
            <div>
                <button type="button"
                        className="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Open
                </button>
                <ViewModal modalId={this.props.eachRowId} />
            </div>
        )
    }
}


export default ActionButton;
