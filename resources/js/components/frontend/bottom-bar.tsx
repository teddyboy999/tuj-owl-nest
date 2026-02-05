const BottomNavBar = () => {
    return (
        <div>
            <div className="Border"></div>

            <ul className="bottom-nav-elements">
                <li>
                    <a
                        href="https://www.instagram.com/templeunivjapan/"
                        target="_blank"
                    >
                        Instagram
                    </a>
                </li>
                <li>
                    <a
                        href="https://www.youtube.com/c/TempleUniversityJapanCampus"
                        target="_blank"
                    >
                        Youtube
                    </a>
                </li>
                <li>
                    &copy; 2026 Temple University Japan Campus. All Rights
                    Reserved
                </li>
                <li>
                    <a
                        href="https://www.tiktok.com/@templeunivjapan"
                        target="_blank"
                    >
                        TikTok
                    </a>
                </li>
                <li>
                    <a
                        href="www.linkedin.com/school/templeunivjapan/posts/"
                        target="_blank"
                    >
                        LinkedIn
                    </a>
                </li>
            </ul>

            <div className="bottom-right-nav-element">
                <ul>
                    <li>TUJ HOME</li>
                    <li>Admissions</li>
                    <li>Student Services</li>
                    <li>Sample</li>
                    <li>Sample</li>
                </ul>
            </div>
        </div>
    );
};

export default BottomNavBar;
