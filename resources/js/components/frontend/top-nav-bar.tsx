import * as React from "react";
import { JSX } from "react/jsx-runtime";

const TopNavBar = () => 
{
    // Sample->
    // <a href="{{ route('about.page') }}">About Us</a>
    return (
        <div>
            <h1 className="bg-blue-500 size-6">Hello Blyat</h1>
            <ul>
                <li><a href="/">            Home</a></li>
                <li><a href="/event-list">  Event List</a></li>
                <li><a href="/club-list">   Club List</a></li>
                <li><a href="/about">       About Us</a></li>
                <li><a href="/contact">     Contact</a></li>
            </ul>
        </div>
    );
};

export default TopNavBar;
