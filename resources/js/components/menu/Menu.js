import React, {Component} from "react";
import ReactDOM from "react-dom";
import {Navigate} from "react-router-dom";
import ActionButton from "./ActionButton";

class Menu extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            menus: []
        };
    }

    componentDidMount() {
        this.getAllMenus();
    }

    getAllMenus = () => {
        axios.get('http://127.0.0.1:8000/api/menus/all')
            .then((response) => {
                this.setState({menus: response.data});
            })
            .catch((error) => {
                if (error.response.status === 401) {
                    this.setState({errors: error.response.data.errors}, () => {
                        console.log(this.state);
                    })
                }
            })
    }

    render() {
        return (
            <div className="flex flex-col">
                <div className="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div className="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div className="overflow-hidden">
                            <table className="min-w-full">
                                <thead className="border-b">
                                <tr>
                                    <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Name
                                    </th>
                                    <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Price
                                    </th>
                                    <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Image
                                    </th>
                                    <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Category
                                    </th>
                                    <th scope="col" className="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Made on
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {
                                    this.state.menus.length === 0 ? 'Loading Menus ...'
                                        :
                                        this.state.menus.map(menu => (
                                            <tr key={menu.id} className="border-b">
                                                <td className="text-sm text-gray-900 font-light px-6 py-4
                                                    whitespace-nowrap">
                                                    {menu.name}
                                                </td>
                                                <td className="text-sm text-gray-900 font-light px-6 py-4
                                                    whitespace-nowrap">
                                                    {menu.price} $
                                                </td>
                                                {/*<td className="text-sm text-gray-900 font-light px-6 py-4*/}
                                                {/*    whitespace-nowrap">*/}
                                                {/*    <img src={menu.image}  alt=""/>*/}
                                                {/*</td>*/}
                                                {/*<td className="text-sm text-gray-900 font-light px-6 py-4*/}
                                                {/*    whitespace-nowrap">*/}
                                                {/*    {menu.categories.name} $*/}
                                                {/*</td>*/}
                                                {/*<td className="text-sm text-gray-900 font-light px-6 py-4*/}
                                                {/*    whitespace-nowrap">*/}
                                                {/*    {menu.created_at}*/}
                                                {/*</td>*/}
                                                <td><ActionButton eachRowId={menu.id}/></td>
                                            </tr>
                                        ))
                                }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}


export default Menu;
