const TopNavBar = () => {
    return (
        <div className="m-2 flex h-12 items-center justify-between px-4">
            <div className="flex items-center">
                <img
                    src="https://www.tuj.ac.jp/modules/custom/tu_layout/images/brand/t-cherry.svg"
                    alt="temple-logo"
                    className="h-10 w-10 object-contain"
                />
            </div>

            <ul className="flex space-x-6">
                <li className="hover:underline">
                    <a href="/">Home</a>
                </li>
                <li className="hover:underline">
                    <a href="/event-list">Event List</a>
                </li>
                <li className="hover:underline">
                    <a href="/club-list">Club List</a>
                </li>
                <li className="hover:underline">
                    <a href="/about">About Us</a>
                </li>
                <li className="hover:underline">
                    <a href="/forums">Forums</a>
                </li>
                <li className="hover:underline">
                    <a href="/contact">Contact</a>
                </li>
                <li className="hover:underline">
                    <a href="/login">Login</a>
                </li>
            </ul>
        </div>
    );
};

export default TopNavBar;
