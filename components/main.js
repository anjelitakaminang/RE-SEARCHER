import React, { Component } from 'react';
class App extends React.Component{
    constructor(props){
        super(props);
    }
    render (){
        return (
            <div>
                <header><HeaderPage/></header>
                <section>
                    <nav><HistoryPage/></nav>
                </section>
                <nav><FooterPage/></nav>
            </div>
        )
    }
}

ReactDOM.render(<App/>. document.getElementById("app"));