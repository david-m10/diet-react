import React from 'react'
import { Link } from 'react-router-dom'

const Header = () => (
    <nav className='navbar navbar-expand-md navbar-light navbar-laravel'>
        <div className='container'>
            <Link className='navbar-brand' to='/'>Diet</Link>
            <Link className='navbar-brand' to='/dishes'>Dishes</Link>
            <Link className='navbar-brand' to='/products'>Products</Link>
        </div>
    </nav>
);

export default Header