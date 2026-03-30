const TopNavBar = () => {
    const user = (window as any).Laravel?.user;

    return (
        <div className="m-2 flex h-12 items-center justify-between px-4">
            <div className="flex items-center">
                <a href="/">
                    <img
                        src="https://www.tuj.ac.jp/modules/custom/tu_layout/images/brand/t-cherry.svg"
                        alt="temple-logo"
                        className="h-10 w-10 object-contain"
                    ></img>
                </a>
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
                <li>
                    <a href="/community">Community</a>
                </li>

                {user ? (
                    <li className="hover:underline">
                        <form method="POST" action="/logout">
                            <input
                                type="hidden"
                                name="_token"
                                value={(window as any).Laravel.csrfToken}
                            />
                            <button
                                type="submit"
                                className="text-white-400 text-sm font-bold"
                            >
                                Logout ({user.name})
                            </button>
                        </form>
                    </li>
                ) : (
                    <li className="hover:underline">
                        <a href="/login">Login</a>
                    </li>
                )}
            </ul>
        </div>
    );
};

export default TopNavBar;
