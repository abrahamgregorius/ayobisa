import { NavLink } from "react-router-dom"
import Home from "../pages/Home"
import { useState } from "react"

function Navbar() {
    const [isActive, setIsActive] = useState(false)

    function toggleActive() {
        if(isActive) {
            setIsActive(false)
        } else {
            setIsActive(true)
        }
    }

    return(
        <>
            <div className="navbar">
                <div className="container">
                    <div className="nav-head">
                        <div className="nav-left">
                            <h1>AyoTicket</h1>
                        </div>
                        <div className="nav-toggle">
                            <span onClick={toggleActive}>&equiv;</span>
                        </div>
                    </div>                
                    <div className={`nav-body ${isActive ? "show" : ""}`}>
                        <div className="nav-right">
                            <ul>
                                <li><NavLink to={'/'}>Home</NavLink></li>
                                <li><NavLink to={'/'}>Schedules</NavLink></li>
                                <li><NavLink to={'/'}>Your Ticket</NavLink></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Navbar