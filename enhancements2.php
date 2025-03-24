<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("header.inc"); ?>
</head>

<body class="enhancepage">

    </br></br>

    <div class="container" id="assignment_2_JS">
        <h1>JavaScript Interactive Enhancements</h1>
        <p>
            This page showcases the custom JavaScript interactions and dynamic elements used
            throughout the website. Each section includes code examples and
            live demonstrations.
        </p>

        <div class="toc">
            <h2>Table of Contents</h2>
            <ul>
                <li><a href="#form-reset">Form Reset & Session Clearing</a></li>
                <li><a href="#job-search">Job Search Filtering</a></li>
                <li><a href="#salary-filter">Salary Range Filtering</a></li>
                <li><a href="#job-sharing">Job Sharing Functionality</a></li>
                <li><a href="#animation-control">Animation Control</a></li>
                <li><a href="#form-validation">Dynamic Form Validation</a></li>
                <li><a href="#summary_list">Return</a></li>
            </ul>
        </div>

        <div id="form-reset" class="animation-card">
            <h2>Form Reset & Session Clearing</h2>
            <p>
                This enhancement provides a more robust reset functionality for forms by not only
                clearing the visible form fields but also resetting any session data associated
                with the form submission process.
            </p>

            <div class="code-block">
                <pre>
function clearSessionAndReset() {
    // Create a hidden form to submit a reset request
    var resetForm = document.createElement('form');
    resetForm.method = 'POST';
    resetForm.action = 'process_eoi.php';

    var resetInput = document.createElement('input');
    resetInput.type = 'hidden';
    resetInput.name = 'reset_form';
    resetInput.value = '1';

    resetForm.appendChild(resetInput);
    document.body.appendChild(resetForm);
    resetForm.submit();

    // Prevent the default reset behavior until our form submits
    return false;
}

// Add onclick handler to the reset button
document.addEventListener('DOMContentLoaded', function() {
    var resetButton = document.querySelector('input[type="reset"]');
    if (resetButton) {
        resetButton.onclick = clearSessionAndReset;
    }
});
                </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>
                    Fill out the form below and click the Reset button to see the session clearing in action:
                </p>
                <div class="form-demo">
                    <form method="post" action="#" id="demo-form">
                        <div class="form-group">
                            <label for="demoName">Name:</label>
                            <input type="text" id="demoName" name="demoName" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="demoEmail">Email:</label>
                            <input type="email" id="demoEmail" name="demoEmail" placeholder="Enter your email">
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset Form">
                        </div>
                    </form>
                </div>
            </div>

            <p>
                This JavaScript functionality is used in the
                <a href="apply.php">Application Form</a>
                to ensure all user data is properly cleared when resetting.
            </p>
        </div>

        <div id="job-search" class="animation-card">
            <h2>Job Search Filtering</h2>
            <p>
                This enhancement provides real-time filtering of job listings as users type in the search box.
                The search matches both job titles and tags, providing a seamless user experience.
            </p>

            <div class="code-block">
                <pre>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector(".search-input");
    const jobCards = document.querySelectorAll(".job-card");

    searchInput.addEventListener("input", function() {
        const searchText = searchInput.value.toLowerCase();

        jobCards.forEach(jobCard => {
            const jobTitle = jobCard.querySelector("h2").textContent.toLowerCase();
            const jobTags = Array.from(jobCard.querySelectorAll(".tag")).map(tag => tag
                .textContent.toLowerCase());

            // Check if job title or any tag includes the search text
            if (jobTitle.includes(searchText) || jobTags.some(tag => tag.includes(
                    searchText))) {
                jobCard.style.display = "block"; // Show job card
            } else {
                jobCard.style.display = "none"; // Hide job card
            }
        });
    });
});
                </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>
                    Type in the search box to filter the job listings below:
                </p>
                <div class="search-demo">
                    <input type="text" class="search-input" placeholder="Search jobs...">

                    <div class="job-listings">
                        <div class="job-card">
                            <h2>Game Developer</h2>
                            <div class="tags">
                                <span class="tag">Unity</span>
                                <span class="tag">C#</span>
                                <span class="tag">3D</span>
                            </div>
                            <p>Join our team to create engaging gaming experiences.</p>
                        </div>

                        <div class="job-card">
                            <h2>UI/UX Designer</h2>
                            <div class="tags">
                                <span class="tag">Figma</span>
                                <span class="tag">Wireframing</span>
                                <span class="tag">User Testing</span>
                            </div>
                            <p>Design intuitive interfaces for our gaming platforms.</p>
                        </div>

                        <div class="job-card">
                            <h2>3D Animator</h2>
                            <div class="tags">
                                <span class="tag">Maya</span>
                                <span class="tag">Blender</span>
                                <span class="tag">Character Animation</span>
                            </div>
                            <p>Create fluid animations for game characters and environments.</p>
                        </div>
                    </div>
                </div>
            </div>

            <p>
                This JavaScript functionality is used in the
                <a href="jobs.php">Jobs Listing</a>
                page to help users find relevant positions quickly.
            </p>
        </div>

        <div id="salary-filter" class="animation-card">
            <h2>Salary Range Filtering</h2>
            <p>
                This enhancement allows users to filter job listings based on salary ranges, making it easier
                to find positions that meet their compensation requirements.
            </p>

            <div class="code-block">
                <pre>
document.getElementById("salaryRange").addEventListener("change", function() {
    let selectedRange = this.value; // Example: "60-80"
    let jobs = document.querySelectorAll(".job-card");

    jobs.forEach(job => {
        let salaryText = job.querySelector(".salary").textContent;
        let salaryMatch = salaryText.match(/\$(\d{1,3}(?:,\d{3})*)\s*-\s*\$(\d{1,3}(?:,\d{3})*)/);

        if (salaryMatch) {
            let minSalary = parseInt(salaryMatch[1].replace(/,/g, ""), 10);
            let maxSalary = parseInt(salaryMatch[2].replace(/,/g, ""), 10);
            let show = false;

            if (selectedRange === "") {
                show = true; // Show all jobs
            } else if (selectedRange === "100-plus") {
                show = minSalary >= 100000;
            } else {
                let [filterMin, filterMax] = selectedRange.split("-").map(n => parseInt(n) * 1000);
                show = (minSalary >= filterMin && minSalary <= filterMax) ||
                    (maxSalary >= filterMin && maxSalary <= filterMax);
            }

            job.style.display = show ? "block" : "none";
        }
    });
});
                </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>Select a salary range to filter the job listings:</p>
                <div class="salary-filter-demo">
                    <select id="salaryRange">
                        <option value="">All Salary Ranges</option>
                        <option value="40-60">$40,000 - $60,000</option>
                        <option value="60-80">$60,000 - $80,000</option>
                        <option value="80-100">$80,000 - $100,000</option>
                        <option value="100-plus">$100,000+</option>
                    </select>

                    <div class="job-listings">
                        <div class="job-card" data-min="45000" data-max="55000">
                            <h2>Junior Game Developer</h2>
                            <p class="salary">$45,000 - $55,000</p>
                            <p>Entry-level position for promising game developers.</p>
                        </div>

                        <div class="job-card" data-min="85000" data-max="95000">
                            <h2>Senior Game Designer</h2>
                            <p class="salary">$85,000 - $95,000</p>
                            <p>Lead the design of our next-generation games.</p>
                        </div>

                        <div class="job-card" data-min="110000" data-max="130000">
                            <h2>Technical Director</h2>
                            <p class="salary">$110,000 - $130,000</p>
                            <p>Oversee technical aspects of multiple game projects.</p>
                        </div>

                        <div class="job-card" data-min="65000" data-max="75000">
                            <h2>Game Artist</h2>
                            <p class="salary">$65,000 - $75,000</p>
                            <p>Create visually stunning assets for our game titles.</p>
                        </div>

                        <div class="job-card" data-min="50000" data-max="60000">
                            <h2>QA Tester</h2>
                            <p class="salary">$50,000 - $60,000</p>
                            <p>Ensure the quality of our gaming experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
            <p>
                This JavaScript functionality is used in the
                <a href="jobs.php">Jobs Listing</a>
                page to provide advanced filtering options.
            </p>
        </div>

        <div id="job-sharing" class="animation-card">
            <h2>Job Sharing Functionality</h2>
            <p>
                This enhancement enables users to easily share job listings with their network using the Web Share
                API,
                with a fallback solution for browsers that don't support this feature.
            </p>

            <div class="code-block">
                <pre>
function shareJob() {
    // Job sharing functionality
    if (navigator.share) {
        navigator.share({
                title: '<?php echo isset($row) ? htmlspecialchars($row['Title']) : "Job Opening"; ?>',
                text: 'Check out this job opportunity!',
                url: window.location.href
            })
            .catch((error) => console.log('Error sharing:', error));
    } else {
        // Fallback for browsers that don't support the Web Share API
        prompt("Copy this link to share:", window.location.href);
    }
}
                </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>
                    Click the share button to share this job listing:
                </p>
                <div class="share-demo">
                    <div class="job-detail">
                        <h2>Senior Game Producer</h2>
                        <p>Lead a team of developers to create our next hit game!</p>
                        <p><strong>Requirements:</strong> 5+ years of experience in game production, strong
                            leadership
                            skills</p>
                        <button onclick="shareDemo()" class="share-button">Share This Job</button>
                    </div>
                </div>
            </div>

            <p>
                This JavaScript functionality is used in the
                <a href="jobdescription.php">Job Details</a>
                page to encourage social sharing of opportunities.
            </p>
        </div>

        <div id="form-validation" class="animation-card">
            <h2>Dynamic Form Validation</h2>
            <p>
                This enhancement provides real-time validation feedback for form inputs, improving
                the user experience and reducing submission errors.
            </p>

            <div class="code-block">
                <pre>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('application-form');
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    
    // Add event listeners to all required inputs
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateInput(this);
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('invalid')) {
                validateInput(this);
            }
        });
    });
    
    // Validate a single input
    function validateInput(input) {
        const errorElement = input.nextElementSibling;
        let isValid = true;
        let errorMessage = '';
        
        // Clear previous error
        input.classList.remove('invalid');
        
        // Check if empty
        if (!input.value.trim()) {
            isValid = false;
            errorMessage = 'This field is required';
        } 
        // Check email format
        else if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address';
        }
        // Check phone format
        else if (input.id === 'phone' && !/^\d{10}$/.test(input.value.replace(/\D/g, ''))) {
            isValid = false;
            errorMessage = 'Please enter a valid 10-digit phone number';
        }
        
        // Display validation result
        if (!isValid) {
            input.classList.add('invalid');
            if (errorElement && errorElement.classList.contains('error-message')) {
                errorElement.textContent = errorMessage;
                errorElement.style.display = 'block';
            }
        } else if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.textContent = '';
            errorElement.style.display = 'none';
        }
        
        return isValid;
    }
    
    // Form submission validation
    form.addEventListener('submit', function(e) {
        let formValid = true;
        
        // Validate all required inputs
        inputs.forEach(input => {
            if (!validateInput(input)) {
                formValid = false;
            }
        });
        
        if (!formValid) {
            e.preventDefault();
            document.querySelector('.form-error-summary').textContent = 'Please correct the errors above before submitting';
            document.querySelector('.form-error-summary').style.display = 'block';
        }
    });
});
                </pre>
            </div>

            <div class="demo-section">
                <h3>Live Demo</h3>
                <p>
                    Try submitting the form without filling in required fields:
                </p>
                <div class="validation-demo">
                    <form id="application-form">
                        <div class="form-group">
                            <label for="name">Name (required)</label>
                            <input type="text" id="name" name="name" required>
                            <span class="error-message"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email (required)</label>
                            <input type="email" id="email" name="email" required>
                            <span class="error-message"></span>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone (required)</label>
                            <input type="tel" id="phone" name="phone" required>
                            <span class="error-message"></span>
                        </div>

                        <div class="form-error-summary"></div>

                        <div class="form-actions">
                            <input type="submit" value="Submit Application">
                        </div>
                    </form>
                </div>
            </div>

            <p>
                This JavaScript functionality is used in the
                <a href="apply.pbp">Application Form</a>
                to guide users through proper form completion.
            </p>
        </div>
    </div>

    <script>
    // Demo functionality for the page
    document.addEventListener('DOMContentLoaded', function() {
        // Share demo function
        window.shareDemo = function() {
            if (navigator.share) {
                navigator.share({
                    title: 'Senior Game Producer',
                    text: 'Check out this job opportunity!',
                    url: window.location.href
                }).catch((error) => alert('Error sharing: ' + error));
            } else {
                prompt("Copy this link to share:", window.location.href);
            }
        };

        // Animation control demo
        const animatedElements = document.querySelectorAll('.animated-element');
        animatedElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.animationPlayState = 'paused';
            });

            element.addEventListener('mouseleave', function() {
                this.style.animationPlayState = 'running';
            });

            element.addEventListener('click', function() {
                this.style.animation = 'none';
                setTimeout(() => {
                    this.style.animation = '';
                }, 10);
            });
        });

        // Form validation demo
        const form = document.getElementById('application-form');
        if (form) {
            const inputs = form.querySelectorAll('input[required]');

            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateInput(this);
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('invalid')) {
                        validateInput(this);
                    }
                });
            });

            function validateInput(input) {
                const errorElement = input.nextElementSibling;
                let isValid = true;
                let errorMessage = '';

                input.classList.remove('invalid');

                if (!input.value.trim()) {
                    isValid = false;
                    errorMessage = 'This field is required';
                } else if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
                    isValid = false;
                    errorMessage = 'Please enter a valid email address';
                } else if (input.id === 'phone' && !/^\d{10}$/.test(input.value.replace(/\D/g, ''))) {
                    isValid = false;
                    errorMessage = 'Please enter a valid 10-digit phone number';
                }

                if (!isValid) {
                    input.classList.add('invalid');
                    if (errorElement) {
                        errorElement.textContent = errorMessage;
                        errorElement.style.display = 'block';
                    }
                } else if (errorElement) {
                    errorElement.textContent = '';
                    errorElement.style.display = 'none';
                }

                return isValid;
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                let formValid = true;

                inputs.forEach(input => {
                    if (!validateInput(input)) {
                        formValid = false;
                    }
                });

                const errorSummary = document.querySelector('.form-error-summary');
                if (!formValid && errorSummary) {
                    errorSummary.textContent = 'Please correct the errors above before submitting';
                    errorSummary.style.display = 'block';
                } else if (errorSummary) {
                    errorSummary.textContent = 'Form submitted successfully!';
                    errorSummary.style.display = 'block';
                    errorSummary.className = 'form-error-summary success';
                }
            });
        }

        // Job search demo functionality
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            const jobCards = document.querySelectorAll('.job-card');

            searchInput.addEventListener('input', function() {
                const searchText = this.value.toLowerCase();

                jobCards.forEach(card => {
                    const title = card.querySelector('h2').textContent.toLowerCase();
                    const tags = Array.from(card.querySelectorAll('.tag')).map(tag => tag
                        .textContent.toLowerCase());

                    if (title.includes(searchText) || tags.some(tag => tag.includes(
                            searchText))) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }

        // Salary filter demo
        const salaryRange = document.getElementById('salaryRange');
        if (salaryRange) {
            const jobs = document.querySelectorAll('.job-card');

            salaryRange.addEventListener('change', function() {
                const selectedRange = this.value;

                jobs.forEach(job => {
                    const salaryText = job.querySelector('.salary').textContent;
                    const salaryMatch = salaryText.match(
                        /\$(\d{1,3}(?:,\d{3})*)\s*-\s*\$(\d{1,3}(?:,\d{3})*)/);

                    if (salaryMatch) {
                        const minSalary = parseInt(salaryMatch[1].replace(/,/g, ''), 10);
                        const maxSalary = parseInt(salaryMatch[2].replace(/,/g, ''), 10);
                        let show = false;

                        if (selectedRange === '') {
                            show = true;
                        } else if (selectedRange === '100-plus') {
                            show = minSalary >= 100000;
                        } else {
                            const [filterMin, filterMax] = selectedRange.split('-').map(n =>
                                parseInt(n) * 1000);
                            show = (minSalary >= filterMin && minSalary <= filterMax) ||
                                (maxSalary >= filterMin && maxSalary <= filterMax);
                        }

                        job.style.display = show ? 'block' : 'none';
                    }
                });
            });
        }
    });
    </script>
</body>

</html>
