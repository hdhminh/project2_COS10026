<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("header.inc"); ?>
</head>

<body class="enhancepage">
    <?php 
        session_start();
        require_once("menu.inc.php"); ?>
    </br></br>

    <div class="container" id="summary_list">
        <h1>Full Assignments Enhancements</h1>
        <p>
            This page showcases all of enhancements from assignment 1 to assignment 2. Each part includes
            code examples and live samples.
        </p>

        <div class="toc">
            <h2>List of Sections</h2>
            <ul>
                <li><a href="#assignment_1_CSS">Assignment 1 - CSS Enhancements</a></li>
                <li><a href="#assignment_2_JS">Assignment 2 - JavaScript Enhancements</a></li>
                <li><a href="#assignment_2_PHP">Assignment 2 - PHP Enhancements</a></li>
            </ul>
        </div>
    </div>

    <div class="container" id="assignment_1_CSS">
        <h1>Animation & Interactive Enhancements</h1>
        <p>
            This page showcases the custom animations and interactive elements used
            throughout the website. Each section includes code examples and
            live demonstrations.
        </p>

        <div class="toc">
            <h2>Table of Contents</h2>
            <ul>
                <li><a href="#radio-animation">Radio Button Animation</a></li>
                <li><a href="#checkbox-animation">Checkbox Animation</a></li>
                <li><a href="#description-fade-in">Description Fade In</a></li>
                <li><a href="#page-reveal">Page Reveal</a></li>
                <li><a href="#background-slideshow">Background Slideshow</a></li>
                <li><a href="#game-autorun">Game AutoRun</a></li>
                <li><a href="#summary_list">Return </a></li>
            </ul>
        </div>

        <div id="rotating-borders" class="animation-card">
            <h2>Rotating Animated Borders</h2>
            <p>
                This enhancement creates an animated glowing border effect that
                rotates around form elements when they receive focus. The animation
                creates an engaging visual cue for users.
            </p>

            <div class="code-block">
                <pre>
.animatedborders {
  position: relative;
  padding: 3px;
  border-radius: 20px;
  overflow: hidden;
  margin-bottom: 32px;
  z-index: 0;
}

.animatedborders::before {
  content: "";
  position: absolute;
  top: 15%;
  left: -50%;
  width: 100%;
  height: 40%;
  background-color: transparent;
  z-index: 1;
}

.animatedborders:focus-within::before {
  content: "";
  position: absolute;
  top: 15%;
  left: -50%;
  width: 100%;
  height: 40%;
  background: linear-gradient(
    0deg,
    transparent,
    transparent,
    var(--borderColor),
    var(--borderColor),
    var(--borderColor)
  );
  animation: rotateBorders 6s linear infinite;
  transform-origin: bottom right;
  z-index: -1;
}

@keyframes rotateBorders {
  0% {
    transform: rotate(0deg);
  }
  25% {
    transform: rotate(90deg);
  }
  50% {
    transform: rotate(180deg);
  }
  75% {
    transform: rotate(270deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
          </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>
                    Click on the input field below to see the rotating border animation:
                </p>
                <div class="form-demo">
                    <input type="text" id="demoInput" placeholder="Focus here to see animation" aria-label="Enter Text">
                </div>
            </div>

            <p>
                This animation is used in the
                <a href="apply.html#personal-info">Personal Information</a>
                section of the application form.
            </p>
        </div>

        <div id="radio-animation" class="animation-card">
            <h2>Radio Button Animation</h2>
            <p>
                Custom radio buttons with a subtle scale animation when selected,
                providing visual feedback for user interaction.
            </p>

            <div class="code-block">
                <pre>
.applypage .gender-options input[type="radio"]:checked + label:before {
  background-color: var(--borderColor);
}

.applypage .gender-options input[type="radio"]:checked + label:after {
  transform: translateY(-50%) scale(1);
}

@keyframes radioScale {
  0% {
    transform: translateY(-50%) scale(1);
  }
  50% {
    transform: translateY(-50%) scale(0.9);
  }
  100% {
    transform: translateY(-50%) scale(1);
  }
}

.applypage .gender-options input[type="radio"]:checked + label:before {
  animation: radioScale 0.3s ease-in-out;
}
          </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>Select a gender option to see the animation:</p>
                <div class="radio-demo">
                    <input type="radio" id="male" name="gender" />
                    <label for="male" class="radio-label">Male</label>

                    <input type="radio" id="female" name="gender" />
                    <label for="female" class="radio-label">Female</label>

                    <input type="radio" id="other" name="gender" />
                    <label for="other" class="radio-label">Other</label>
                </div>
            </div>

            <p>
                This animation is used in the
                <a href="apply.html#personal_info">Gender Selection</a>
                section of the application form.
            </p>
        </div>

        <div id="checkbox-animation" class="animation-card">
            <h2>Checkbox Animation</h2>
            <p>
                Enhanced checkbox inputs with scale animation and hover effects for a
                more interactive experience.
            </p>

            <div class="code-block">
                <pre>
.applypage .skill-item input[type="checkbox"]:checked + label:before {
  background-color: var(--borderColor);
}

.applypage .skill-item input[type="checkbox"]:checked + label:after {
  opacity: 1;
}

.applypage .skill-item:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateX(10px);
}

@keyframes checkScale {
  0% {
    transform: translateY(-50%) scale(1);
  }
  50% {
    transform: translateY(-50%) scale(0.9);
  }
  100% {
    transform: translateY(-50%) scale(1);
  }
}

.applypage .skill-item input[type="checkbox"]:checked + label:before {
  animation: checkScale 0.3s ease-in-out;
}
          </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>Select skills to see the checkbox animation:</p>
                <div class="checkbox-demo">
                    <div class="checkbox-item">
                        <input type="checkbox" id="html" />
                        <label for="html" class="checkbox-label">Team Work</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="css" />
                        <label for="css" class="checkbox-label">Communication</label>
                    </div>

                    <div class="checkbox-item">
                        <input type="checkbox" id="javascript" />
                        <label for="javascript" class="checkbox-label">Adaptability</label>
                    </div>
                </div>
            </div>

            <p>
                This animation is used in the
                <a href="apply.html#skills">Skills Selection</a> section of the
                application form.
            </p>
        </div>

        <div id="description-fade-in" class="animation-card">
            <h2>Description Fade In</h2>
            <p>
                This enhancement displays the overview, key responsibilities,
                essential requirements, and preferable skills for the job that you
                click on. The animation creates clarity and uses efficient screen
                space to reduce clutter in the webpage.
            </p>

            <div class="code-block">
                <pre>
            .description-panel {
            flex: 2;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 5px 25px var(--shadowColor);
            overflow: hidden;
          }
          
          .description-content {
            display: none;
            height: 100%;
            animation: fadeIn 0.3s ease;
          }
          
          @keyframes fadeIn {
            from {
              opacity: 0;
            }
            to {
              opacity: 1;
            }
          }
          .description-content:target {
            display: flex;
          }
          
          #default-desc {
            display: flex;
            padding: 3rem;
            align-items: center;
            justify-content: center;
            color: var(--textColor);
          }
          
          .desc-column {
            flex: 1;
            padding: 2rem;
          }
          
          .desc-column:first-child {
            border-right: 1px solid var(--borderColor);
          }
        </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <div class="description-nav">
                    <a href="#job1">Game Developer</a>
                    <a href="#job2">3D Artist</a>
                    <a href="#job3">QA Tester</a>
                </div>

                <div class="description-panel">

                    <div id="job1" class="description-content">
                        <h2>Game Developer</h2>
                        <h3>Overview</h3>
                        <p>
                            Join our team to create engaging gaming experiences using
                            cutting-edge technology and creative storytelling.
                        </p>

                        <h3>Key Responsibilities</h3>
                        <ul>
                            <li>Develop game mechanics and systems</li>
                            <li>Optimize performance across multiple platforms</li>
                            <li>Collaborate with artists and designers</li>
                        </ul>

                        <h3>Requirements</h3>
                        <ul>
                            <li>3+ years experience in game development</li>
                            <li>Proficiency in C++ and Unity/Unreal</li>
                            <li>Strong problem-solving skills</li>
                        </ul>
                    </div>

                    <div id="job2" class="description-content">
                        <h2>3D Artist</h2>
                        <h3>Overview</h3>
                        <p>
                            Create stunning 3D models, environments, and animation for our
                            award-winning game titles.
                        </p>

                        <h3>Key Responsibilities</h3>
                        <ul>
                            <li>Design and model 3D assets</li>
                            <li>Create textures and materials</li>
                            <li>Optimize models for game engines</li>
                        </ul>

                        <h3>Requirements</h3>
                        <ul>
                            <li>Portfolio demonstrating 3D modeling skills</li>
                            <li>Experience with Maya, Blender, or 3DS Max</li>
                            <li>Understanding of game art pipelines</li>
                        </ul>
                    </div>

                    <div id="job3" class="description-content">
                        <h2>QA Tester</h2>
                        <h3>Overview</h3>
                        <p>
                            Ensure our games meet the highest quality standards through
                            systematic testing and detailed feedback.
                        </p>

                        <h3>Key Responsibilities</h3>
                        <ul>
                            <li>Execute test plans and test cases</li>
                            <li>Report and document bugs</li>
                            <li>Verify fixes and regression testing</li>
                        </ul>

                        <h3>Requirements</h3>
                        <ul>
                            <li>Strong attention to detail</li>
                            <li>Experience with bug tracking systems</li>
                            <li>Passion for video games</li>
                        </ul>
                    </div>
                </div>
            </div>
            <p>
                This animation is used in the
                <a href="jobs.html">Description Panel</a>
                section of the Games Application Jobs page.
            </p>
        </div>

        <div id="page-reveal" class="animation-card">
            <h2>Description Fade In</h2>
            <p>
                This enhancement adds a light blue overlay and reveals the webpage
                when you click on or reload it. The feature creates a smooth
                experience for the user.
            </p>

            <div class="code-block">
                <pre>
          /* Full-screen light blue overlay */
          .overlayblue {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: lightblue;
            z-index: 9999;
            animation: slideAway 1s ease-out forwards;
          }
          
          /* Keyframe animation */
          @keyframes slideAway {
            0% {
              width: 100%;
            }
            100% {
              width: 0%;
            }
          }         
      </pre>
            </div>


            <!-- Page Reveal Demo -->
            <div id="page-reveal" class="animation-card">
                <h3>Live Demo</h3>
                <h2>Page Reveal Animation</h2>
                <p>
                    Hover over the container below to see the page reveal animation with a
                    blue overlay sliding away.
                </p>

                <div class="page-reveal-container">
                    <div class="page-content">
                        <h3>Welcome to our website!</h3>
                    </div>
                    <div class="page-overlay"></div>
                </div>
            </div>

            <p>
                This animation is used in the
                <a href="about.html">About</a>
                page.
            </p>
        </div>

        <div id="background-slideshow" class="animation-card">
            <h2>Background Slideshow</h2>
            <p>
                This enhancement adds a slideshow of our games in the background. The
                animation adds engaging and interesting visuals for the user.
            </p>

            <div class="code-block">
                <pre>
          .background-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            animation: background-slideshow 18s infinite;
            background-size: cover;
            background-position: center;
          }
          
          @keyframes background-slideshow {
            0% {
              background-image: url("images/image1.jpg");
            }
            16% {
              background-image: url("images/image2.png");
            }
            32% {
              background-image: url("images/image3.jpg");
            }
            48% {
              background-image: url("images/image4.png");
            }
            64% {
              background-image: url("images/image5.png");
            }
            80% {
              background-image: url("images/image6.jpg");
            }
            100% {
              background-image: url("images/image1.jpg");
            }
          }
      </pre>
            </div>
            <!-- Background Slideshow Demo -->
            <div id="background-slideshow" class="animation-card">
                <h3>Live Demo</h3>
                <h2>Background Slideshow</h2>
                <p>
                    This demonstrates the automatic background image slideshow that cycles
                    through game screenshots.
                </p>

                <div class="slideshow-container">
                    <div class="slideshow-bg"></div>
                    <div class="slideshow-overlay">
                        <div>
                            <h3>Our Game Portfolio</h3>
                            <p>Experience our award-winning titles</p>
                        </div>
                    </div>
                </div>
            </div>

            <p>
                This animation is used in the
                <a href="about.html">Background</a>
                of the About page.
            </p>
        </div>

        <div id="game-autorun" class="animation-card">
            <h2>Game Autorun</h2>
            <p>
                This showcases our games with continuously running cards. Hover to
                pause the animation and focus on a specific game.
            </p>

            <div class="code-block">
                <pre>
          .slider {
            width: 100%;
            height: var(--height);
            margin-top: 50px;
            position: relative;
            overflow: hidden;
            mask-image: linear-gradient(to right, transparent, #000 10% 90%, transparent);
          }
          .slider .list {
            display: flex;
            width: 100%;
            min-width: calc(var(--width) * var(--quantity));
            position: relative;
          }
          .slider .list .item {
            width: var(--width);
            height: var(--height);
            position: absolute;
            display: flex;
            padding: 10px;
            animation: autoRun 10.5s linear infinite;
            transition: filter 0.5s;
            transition: opacity 0.5s ease-in-out;
            animation-delay: calc(
              (10s / var(--quantity)) * (var(--position) - 1) - 10s
            ) !important;
          }
          
          @keyframes showContent {
            from {
              opacity: 0;
              transform: translateY(20px);
            }
            to {
              opacity: 1;
              transform: translateY(0);
            }
          }
          
          @keyframes showContent {
            0% {
              opacity: 0;
              transform: translateY(20px);
            }
            50% {
              opacity: 1;
              transform: translateY(0);
            }
            100% {
              opacity: 0;
              transform: translateY(-10px);
            }
          }
          
          .slider .list .item .introduce .title,
          .slider .list .item .introduce .topic,
          .slider .list .item .introduce .des {
            opacity: 0;
            animation: showContent 2s ease-in-out infinite alternate;
          }
          
          .slider:hover .list .item .introduce .title,
          .slider:hover .list .item .introduce .topic,
          .slider:hover .list .item .introduce .des {
            opacity: 1 !important;
            transform: translateY(0) !important;
            animation: none !important;
          }
          
          .slider .list .item .introduce .title {
            font-size: 2em;
            font-weight: 500;
            line-height: 1em;
            animation-delay: 0.2s;
          }
          
          .slider .list .item .introduce .topic {
            font-size: 4em;
            font-weight: 500;
            animation-delay: 0.4s;
          }
          
          .slider .list .item .introduce .des {
            font-size: small;
            color: white;
            width: 80%;
            animation-delay: 0.6s;
          }
          
          .slider .list .item img {
            width: 70%;
            height: 65%;
            margin-left: 10px;
          }
          
          /*Key frame*/
          
          @keyframes autoRun {
            from {
              left: 100%;
            }
            to {
              left: calc(var(--width) * -1);
            }
          }
          .slider:hover .item {
            animation-play-state: paused !important;
            filter: grayscale(1);
            opacity: 0.45;
          }
          .slider .item:hover {
            filter: grayscale(0);
            opacity: 1 !important;
          }
          .slider[reverse="true"] .item {
            animation: reversePlay 10s linear infinite;
          }
          @keyframes reversePlay {
            from {
              left: calc(var(--width) * -1);
            }
            to {
              left: 100%;
            }
          }
      </pre>
            </div>
            <div class="animation-card">
                <div class="live_header">
                    <h3>Live Demo</h3>
                    <h2>Game Autorun</h2>
                    <p>
                        The animation automatically allows the user to look at the games displayed.
                    </p>
                </div>
                <div class="slider-container">

                    <div class="slider-mask">
                        <div class="slider-list">
                            <div class="slider-item">
                                <img src="styles/images/image1.jpg" alt="Game 1" class="slider-image" />
                                <div class="slider-content">
                                    <div class="slider-title">Cosmic Odyssey</div>
                                    <div class="slider-description">
                                        An epic space adventure with stunning visuals and immersive
                                        gameplay.
                                    </div>
                                </div>
                            </div>

                            <div class="slider-item">
                                <img src="styles/images/image2.png" alt="Game 2" class="slider-image" />
                                <div class="slider-content">
                                    <div class="slider-title">Kingdom Defenders</div>
                                    <div class="slider-description">
                                        Strategic tower defense with multiple heroes and challenging
                                        levels.
                                    </div>
                                </div>
                            </div>

                            <div class="slider-item">
                                <img src="styles/images/image3.jpg" alt="Game 3" class="slider-image" />
                                <div class="slider-content">
                                    <div class="slider-title">Pixel Racer</div>
                                    <div class="slider-description">
                                        High-speed retro racing with customizable vehicles and
                                        tracks.
                                    </div>
                                </div>
                            </div>

                            <div class="slider-item">
                                <img src="styles/images/image4.png" alt="Game 4" class="slider-image" />
                                <div class="slider-content">
                                    <div class="slider-title">Monster Legends</div>
                                    <div class="slider-description">
                                        Collect and train unique monsters in this turn-based RPG
                                        adventure.
                                    </div>
                                </div>
                            </div>

                            <div class="slider-item">
                                <img src="styles/images/image6.jpg" alt="Game 5" class="slider-image" />
                                <div class="slider-content">
                                    <div class="slider-title">Neon Samurai</div>
                                    <div class="slider-description">
                                        Fast-paced action in a cyberpunk world with cutting-edge
                                        graphics.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p>
                This animation is used in the
                <a href="index.html">Background</a>
                of the Home page.
            </p>
        </div>
    </div>
    <?php require_once("enhancements2.php"); ?>
    <?php require_once("phpenhancements.php"); ?>
    <?php require_once("footer.inc"); ?>
</body>

</html>
