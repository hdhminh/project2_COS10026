<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("head.inc"); ?>
</head>

<body class="jobspage">
    <?php require_once("menu.inc"); ?>

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
            </a>

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

            <!-- More job description sections... -->
            <!-- (I've omitted some of the job descriptions for brevity, but you would keep all of them in your actual implementation) -->

            <!-- Game Artist Description -->
            <div id="artist-desc" class="description-content">
                <!-- Artist description content here -->
            </div>

            <!-- Sound Designer Description -->
            <div id="sound-desc" class="description-content">
                <!-- Sound designer description content here -->
            </div>

            <!-- Game Tester Description -->
            <div id="tester-desc" class="description-content">
                <!-- Game tester description content here -->
            </div>

            <!-- Game Writer Description -->
            <div id="writer-desc" class="description-content">
                <!-- Game writer description content here -->
            </div>

            <!-- UI/UX Designer Description -->
            <div id="uiux-desc" class="description-content">
                <!-- UI/UX designer description content here -->
            </div>
        </div>
    </main>

    <?php require_once("footer.inc"); ?>
</body>

</html>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector(".search-input");
    const jobCards = document.querySelectorAll(".job-card");

    searchInput.addEventListener("input", function () {
        const searchText = searchInput.value.toLowerCase();

        jobCards.forEach(jobCard => {
            const jobTitle = jobCard.querySelector("h2").textContent.toLowerCase();
            const jobTags = Array.from(jobCard.querySelectorAll(".tag")).map(tag => tag.textContent.toLowerCase());

            // Check if job title or any tag includes the search text
            if (jobTitle.includes(searchText) || jobTags.some(tag => tag.includes(searchText))) {
                jobCard.style.display = "block"; // Show job card
            } else {
                jobCard.style.display = "none"; // Hide job card
            }
        });
    });
});

</script>
