<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("head.inc"); ?>
</head>

<body class="jobspage">
    <?php require_once("menu.inc"); ?>
    </br></br></br>
    <h1>Game Applications Jobs</h1>
    <div class="nav-search">
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="search" class="search-input" placeholder="Search positions, skills..."
                aria-label="Search positions and skills" />
            <div class="search-results">
                <!-- Search results will be populated dynamically -->
            </div>
        </div>
        <div class="salary-filter">
            <select aria-label="Filter by salary range">
                <option value="">Salary Range</option>
                <option value="40-60">$40,000 - $60,000</option>
                <option value="60-80">$60,000 - $80,000</option>
                <option value="80-100">$80,000 - $100,000</option>
                <option value="100-plus">$100,000+</option>
            </select>
        </div>
    </div>
    <main>
        <!-- Job Listings Section -->
        <div class="job-listings">
            <a href="#developer-desc" class="job-card">
                <h2>🎮 Game Developer</h2>
                <p class="job-meta"><strong>Ref:</strong> GD123</p>
                <p class="job-brief">
                    Build and optimize core game mechanics, ensure performance
                    efficiency, and collaborate with teams.
                </p>
                <p class="job-meta">💰 $75,000 - $110,000 per year</p>
                <div class="job-tags">
                    <span class="tag">Full-time</span>
                    <span class="tag">Remote</span>
                    <span class="tag">Senior Level</span>
                    <span class="tag">C++</span>
                    <span class="tag">Unity</span>
                </div>
            </a>

            <a href="#artist-desc" class="job-card">
                <h2>🎨 Game Artist</h2>
                <p class="job-meta"><strong>Ref:</strong> GA456</p>
                <p class="job-brief">
                    Create stunning visual assets for the game world, including
                    characters and environments.
                </p>
                <p class="job-meta">💰 $65,000 - $95,000 per year</p>
                <div class="job-tags">
                    <span class="tag">Full-time</span>
                    <span class="tag">Hybrid</span>
                    <span class="tag">Mid Level</span>
                    <span class="tag">3D Modeling</span>
                    <span class="tag">Blender</span>
                </div>

                <a href="#sound-desc" class="job-card">
                    <h2>🎵 Game Sound Designer</h2>
                    <p class="job-meta"><strong>Ref:</strong> SD789</p>
                    <p class="job-brief">
                        Craft and implement high-quality sound effects, music, and dialogue.
                    </p>
                    <p class="job-meta">💰 $60,000 - $90,000 per year</p>

                    <div class="job-tags">
                        <span class="tag">Full-time</span>
                        <span class="tag">On-site</span>
                        <span class="tag">Mid Level</span>
                        <span class="tag">FMOD</span>
                        <span class="tag">Wwise</span>
                    </div>
                </a>
                <a href="#tester-desc" class="job-card">
                    <h2>🧪 Game Tester</h2>
                    <p class="job-meta"><strong>Ref:</strong> GT101</p>
                    <p class="job-brief">
                        Test and identify bugs in game features, and ensure quality control.
                    </p>
                    <p class="job-meta">💰 $45,000 - $70,000 per year</p>
                    <div class="job-tags">
                        <span class="tag">Full-time</span>
                        <span class="tag">Hybrid</span>
                        <span class="tag">Entry Level</span>
                        <span class="tag">QA</span>
                        <span class="tag">Jira</span>
                    </div>
                </a>

                <a href="#writer-desc" class="job-card">
                    <h2>✍️ Game Writer</h2>
                    <p class="job-meta"><strong>Ref:</strong> GW202</p>
                    <p class="job-brief">
                        Write compelling narratives, dialogue, and storylines for the game.
                    </p>
                    <p class="job-meta">💰 $50,000 - $80,000 per year</p>
                    <div class="job-tags">
                        <span class="tag">Full-time</span>
                        <span class="tag">Remote</span>
                        <span class="tag">Mid Level</span>
                        <span class="tag">Narrative</span>
                        <span class="tag">Creative</span>
                    </div>
                </a>

                <a href="#uiux-desc" class="job-card">
                    <h2>🎮 UI/UX Designer</h2>
                    <p class="job-meta"><strong>Ref:</strong> IX303</p>
                    <p class="job-brief">
                        Design user-friendly interfaces and improve the overall player
                        experience.
                    </p>
                    <p class="job-meta">💰 $60,000 - $95,000 per year</p>
                    <div class="job-tags">
                        <span class="tag">Full-time</span>
                        <span class="tag">Hybrid</span>
                        <span class="tag">Senior Level</span>
                        <span class="tag">Figma</span>
                        <span class="tag">Unity</span>
                    </div>
                </a>
        </div>

        <!-- Description Panel -->
        <div class="description-panel">
            <div id="default-desc" class="description-content">
                <h2>Select a Position to View Details</h2>
            </div>

            <!-- Game Developer Description -->
            <div id="developer-desc" class="description-content">
                <div class="desc-column">
                    <h2>🎮 Game Developer</h2>
                    <div class="meta-info">
                        <p><strong>Reference:</strong> GD123</p>
                        <p><strong>Salary Range:</strong> $75,000 - $110,000 per year</p>
                        <p><strong>Reports to:</strong> Lead Developer</p>
                    </div>
                    <p>
                        <strong>Overview:</strong> As a Game Developer, you'll be
                        responsible for building and optimizing core game mechanics,
                        ensuring performance efficiency, and collaborating with various
                        teams to create immersive and polished experiences.
                    </p>

                    <div class="button-container">
                        <button class="btn btn-save">
                            <span class="heart"></span>
                            Save job
                        </button>
                        <button class="btn btn-apply">Apply now</button>
                    </div>
                </div>
                <div class="desc-column">
                    <h3>Key Responsibilities</h3>
                    <ol>
                        <li>
                            Develop and maintain game mechanics using C++, C#, or Unity.
                        </li>
                        <li>Optimize game performance and debugging.</li>
                        <li>
                            Collaborate with designers and artists to integrate assets.
                        </li>
                    </ol>
                    <h3>Essential Requirements</h3>
                    <ul>
                        <li>3+ years of experience in game development.</li>
                        <li>Proficiency in C++, C#, or Unity.</li>
                        <li>Strong problem-solving and debugging skills.</li>
                    </ul>
                    <h3>Preferable Skills</h3>
                    <ul>
                        <li>Experience with multiplayer networking.</li>
                        <li>Familiarity with Unreal Engine.</li>
                    </ul>
                </div>
            </div>

            <!-- Game Artist Description -->
            <div id="artist-desc" class="description-content">
                <div class="desc-column">
                    <h2>🎨 Game Artist</h2>
                    <div class="meta-info">
                        <p><strong>Reference:</strong> GA456</p>
                        <p><strong>Salary Range:</strong> $65,000 - $95,000 per year</p>
                        <p><strong>Reports to:</strong> Art Director</p>
                    </div>
                    <p>
                        <strong>Overview:</strong> As a Game Artist, you'll be creating
                        stunning visual assets for the game world, including characters,
                        environments, and user interfaces, ensuring a seamless integration
                        with game design.
                    </p>

                    <div class="button-container">
                        <button class="btn btn-save">
                            <span class="heart"></span>
                            Save job
                        </button>
                        <button class="btn btn-apply">Apply now</button>
                    </div>
                </div>
                <div class="desc-column">
                    <h3>Key Responsibilities</h3>
                    <ol>
                        <li>
                            Create 2D/3D assets for characters, environments, and UI
                            elements.
                        </li>
                        <li>
                            Work closely with designers to ensure a cohesive artistic style.
                        </li>
                        <li>Optimize assets for real-time rendering.</li>
                    </ol>
                    <h3>Essential Requirements</h3>
                    <ul>
                        <li>2+ years of experience in game art production.</li>
                        <li>Proficiency in Photoshop, Blender, or Maya.</li>
                        <li>Understanding of texture mapping and shading.</li>
                    </ul>
                    <h3>Preferable Skills</h3>
                    <ul>
                        <li>Experience in character rigging.</li>
                        <li>Knowledge of UI/UX design for games.</li>
                    </ul>
                </div>
            </div>

            <!-- Sound Designer Description -->
            <div id="sound-desc" class="description-content">
                <div class="desc-column">
                    <h2>🎵 Game Sound Designer</h2>
                    <div class="meta-info">
                        <p><strong>Reference:</strong> SD789</p>
                        <p><strong>Salary Range:</strong> $60,000 - $90,000 per year</p>
                        <p><strong>Reports to:</strong> Audio Director</p>
                    </div>
                    <p>
                        <strong>Overview:</strong> As a Game Sound Designer, you'll be
                        responsible for crafting and implementing high-quality sound
                        effects, music, and dialogue, collaborating closely with the
                        development team to ensure immersive audio experiences.
                    </p>

                    <div class="button-container">
                        <button class="btn btn-save">
                            <span class="heart"></span>
                            Save job
                        </button>
                        <button class="btn btn-apply">Apply now</button>
                    </div>
                </div>
                <div class="desc-column">
                    <h3>Key Responsibilities</h3>
                    <ol>
                        <li>
                            Design and implement high-quality sound effects and music.
                        </li>
                        <li>Collaborate with developers to integrate audio.</li>
                        <li>Mix and master game audio to industry standards.</li>
                    </ol>
                    <h3>Essential Requirements</h3>
                    <ul>
                        <li>3+ years of experience in game audio design.</li>
                        <li>Proficiency in FMOD or Wwise.</li>
                        <li>Strong understanding of sound mixing and mastering.</li>
                    </ul>
                    <h3>Preferable Skills</h3>
                    <ul>
                        <li>Experience with adaptive music composition.</li>
                        <li>Familiarity with Unity or Unreal Engine audio systems.</li>
                    </ul>
                </div>
            </div>

            <!-- Game Tester Description -->
            <div id="tester-desc" class="description-content">
                <div class="desc-column">
                    <h2>🧪 Game Tester</h2>
                    <div class="meta-info">
                        <p><strong>Reference:</strong> GT101</p>
                        <p><strong>Salary Range:</strong> $45,000 - $70,000 per year</p>
                        <p><strong>Reports to:</strong> QA Lead</p>
                    </div>
                    <p>
                        <strong>Overview:</strong> As a Game Tester, you'll be responsible
                        for testing new game features, identifying bugs, and ensuring that
                        the game meets the highest quality standards while providing
                        detailed feedback for improvements.
                    </p>

                    <div class="button-container">
                        <button class="btn btn-save">
                            <span class="heart"></span>
                            Save job
                        </button>
                        <button class="btn btn-apply">Apply now</button>
                    </div>
                </div>
                <div class="desc-column">
                    <h3>Key Responsibilities</h3>
                    <ol>
                        <li>
                            Test new game features for bugs and issues systematically.
                        </li>
                        <li>
                            Document and report issues clearly to developers and track
                            fixes.
                        </li>
                        <li>Collaborate with QA team to ensure smooth game releases.</li>
                        <li>Perform regression testing and verify bug fixes.</li>
                    </ol>
                    <h3>Essential Requirements</h3>
                    <ul>
                        <li>Experience in software testing or QA.</li>
                        <li>Strong attention to detail and problem-solving skills.</li>
                        <li>Familiarity with bug-tracking tools like Jira.</li>
                        <li>Excellent written and verbal communication skills.</li>
                    </ul>
                    <h3>Preferable Skills</h3>
                    <ul>
                        <li>Previous experience in game testing.</li>
                        <li>Knowledge of testing methodologies and best practices.</li>
                        <li>Understanding of game development processes.</li>
                    </ul>
                </div>
            </div>

            <!-- Game Writer Description -->
            <div id="writer-desc" class="description-content">
                <div class="desc-column">
                    <h2>✍️ Game Writer</h2>
                    <div class="meta-info">
                        <p><strong>Reference:</strong> GW202</p>
                        <p><strong>Salary Range:</strong> $50,000 - $80,000 per year</p>
                        <p><strong>Reports to:</strong> Narrative Director</p>
                    </div>
                    <p>
                        <strong>Overview:</strong> As a Game Writer, you'll be responsible
                        for crafting compelling narratives, dialogue, and story arcs that
                        drive the game, working closely with the development team to
                        ensure cohesive storytelling across all game elements.
                    </p>

                    <div class="button-container">
                        <button class="btn btn-save">
                            <span class="heart"></span>
                            Save job
                        </button>
                        <button class="btn btn-apply">Apply now</button>
                    </div>
                </div>
                <div class="desc-column">
                    <h3>Key Responsibilities</h3>
                    <ol>
                        <li>Write compelling narratives, dialogue, and story arcs.</li>
                        <li>
                            Collaborate with game designers to integrate story elements.
                        </li>
                        <li>
                            Ensure consistency in game lore and character development.
                        </li>
                        <li>Create engaging quest lines and mission descriptions.</li>
                    </ol>
                    <h3>Essential Requirements</h3>
                    <ul>
                        <li>Proven experience in narrative writing or game writing.</li>
                        <li>Strong storytelling skills with attention to detail.</li>
                        <li>
                            Ability to create immersive and engaging characters and worlds.
                        </li>
                        <li>Experience with narrative design in interactive media.</li>
                    </ul>
                    <h3>Preferable Skills</h3>
                    <ul>
                        <li>
                            Experience with branching narratives and dialogue systems.
                        </li>
                        <li>Understanding of game design principles.</li>
                        <li>Background in creative writing or screenwriting.</li>
                    </ul>
                </div>
            </div>

            <!-- UI/UX Designer Description -->
            <div id="uiux-desc" class="description-content">
                <div class="desc-column">
                    <h2>🎮 UI/UX Designer</h2>
                    <div class="meta-info">
                        <p><strong>Reference:</strong> IX303</p>
                        <p><strong>Salary Range:</strong> $60,000 - $100,000 per year</p>
                        <p><strong>Reports to:</strong> UI/UX Lead</p>
                    </div>
                    <p>
                        <strong>Overview:</strong> As a Game UI/UX Designer, you'll be
                        responsible for creating intuitive and engaging user interfaces,
                        optimizing player experience, and ensuring smooth interactions
                        within the game while maintaining visual consistency.
                    </p>

                    <div class="button-container">
                        <button class="btn btn-save">
                            <span class="heart"></span>
                            Save job
                        </button>
                        <button class="btn btn-apply">Apply now</button>
                    </div>
                </div>
                <div class="desc-column">
                    <h3>Key Responsibilities</h3>
                    <ol>
                        <li>Design user-friendly interfaces, menus, and HUD elements.</li>
                        <li>Create wireframes and prototypes for new features.</li>
                        <li>Work closely with developers to integrate UI elements.</li>
                        <li>
                            Conduct user testing and iterate designs based on feedback.
                        </li>
                    </ol>
                    <h3>Essential Requirements</h3>
                    <ul>
                        <li>
                            3+ years of experience in UI/UX design, preferably in gaming.
                        </li>
                        <li>
                            Proficiency in design tools like Figma, Sketch, or Adobe XD.
                        </li>
                        <li>Strong understanding of user-centered design principles.</li>
                        <li>Experience with interaction design and prototyping.</li>
                    </ul>
                    <h3>Preferable Skills</h3>
                    <ul>
                        <li>Knowledge of game engine UI systems (Unity, Unreal).</li>
                        <li>Understanding of animation and motion design.</li>
                        <li>Experience with user research and analytics.</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("footer.inc"); ?>
</body>

</html>