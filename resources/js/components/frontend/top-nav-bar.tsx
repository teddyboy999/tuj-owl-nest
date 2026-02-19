const TopNavBar = () => {
    // Sample->
    // <a href="{{ route('about.page') }}">About Us</a>
    return (
        <div className="mt-2 mr-2 mb-2 ml-2 h-8 justify-center px-2 py-2 align-middle">
            <ul className="flex justify-end space-x-6 align-middle">
                <li className="hover:underline">
                    <a href="/"> Home</a>
                </li>
                <li className="hover:underline">
                    <a href="/event-list"> Event List</a>
                </li>
                <li className="hover:underline">
                    <a href="/club-list"> Club List</a>
                </li>
                <li className="hover:underline">
                    <a href="/about"> About Us</a>
                </li>
                <li className="hover:underline">
                    <a href="/contact"> Contact</a>
                </li>
                <li className="hover:underline">
                    <a href="/login">Login</a>
                </li>
            </ul>
        </div>
    );
};

export default TopNavBar;
