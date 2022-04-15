import React, {Component} from "react";
import ReactDOM from "react-dom";
import ViewModal from "./ViewModal";

class ActionButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            currentMenuName: null,
            currentMenuPrice: null
        };
    }

    getMenuDetails = (id) => {
        axios.post('http://127.0.0.1:8000/api/menus/details', {
            menuId: id
        })
            .then(response => {
                this.setState({
                    currentMenuName: response.data['name'],
                    currentMenuPrice: response.data['price']
                })

            })
    }


    render() {
        return (
            <div>
                <button type="button"
                        className="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-toggle="modal" data-bs-target={"#viewModal"+this.props.eachRowId}
                        onClick={() => {
                            this.getMenuDetails(this.props.eachRowId)
                        }}>
                    Open
                </button>
                <ViewModal modalId={this.props.eachRowId} menuData={ this.state }/>
            </div>
        )
    }
}


export default ActionButton;
