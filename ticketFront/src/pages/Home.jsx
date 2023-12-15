import Navbar from "../components/Navbar"

function Home() {
    return(
        <>
            <Navbar></Navbar>

            <div className="header"></div>

            <div className="hero">
                <div className="container">
                    <div className="hero-head">
                        <h1>Hello world!</h1>
                    </div>
                    <div className="hero-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod nulla dicta vitae officia, corrupti ex rem? Iusto, enim nisi tenetur minima labore similique omnis illum?</p>
                    </div>
                </div>
            </div>


        </>
    )
}

export default Home