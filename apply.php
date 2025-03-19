<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("header.inc"); ?>
</head>

<body class="applypage">
    <?php require_once("menu.inc"); ?>
    </br></br></br>
    <h1>Job Application Form</h1>
    <form method="post" action="process_eoi.php">
        <div class="animatedborders">
            <fieldset>
                <!--Position Form only text 5 alphanumberic-->
                <legend>Position</legend>
                <p class="game-info">
                    <span class="role">🎮 Game Developer: GD123</span> <br>
                    <span class="role">🎨 Game Artist:&nbsp;&nbsp; GA456</span> <br>
                    <span class="role">🎵 Sound Designer: SD789</span> <br>
                    <span class="role">🧪 Game Tester:&nbsp; GT101</span><br>
                    <span class="role">✍️ Game Writer: GW202</span> <br>
                    <span class="role">🎮 UI/UX Designer: IX303</span>
                </p>
                <p>
                    <label for="Position">Job Reference Number</label>
                    <input type="text" id="Position" name="position" required="required" placeholder="e.g: GD123"
                        maxlength="5" size="10" pattern="[a-zA-Z0-9]+" />
                </p>
            </fieldset>
        </div>
        <div class="animatedborders" id="personal_info">
            <fieldset>
                <!--Personal Information name and DoB-->
                <legend>Personal Information</legend>
                <p>
                    <label for="FirstName">First Name</label>
                    <input type="text" id="FirstName" name="First_Name" maxlength="20" size="40" required="required"
                        placeholder="First Name" pattern="[a-zA-Z ]+" />
                </p>
                <p>
                    <label for="LastName">Last Name</label>
                    <input type="text" id="LastName" name="Last_Name" maxlength="20" size="40" required="required"
                        placeholder="Last Name" pattern="[a-zA-Z ]+" />
                </p>
                <p>
                    <label for="DateOfBirth">Date Of Birth</label>
                    <input type="text" id="DateOfBirth" name="DOB" required="required" placeholder="DD/MM/YYYY"
                        pattern="\d{2}/\d{2}/\d{4}" />
                </p>
                <p>
                    <label for="Email">Email</label>
                    <input type = "email" id = "Email" name = "Email" required = "required" placeholder = "name@example.com"/>
                </p>
                <p>
                    <label for="PhoneNumber">Phone Number</label>
                    <input type = "text" id = "PhoneNumber" name = "Phone" required = "required" placeholder = "37252525" 
                    pattern="[0-9]+">
                </p>
                <p id="genders">
                    <label for="genders">Gender</label>
                <div class="gender-options">
                    <input type="radio" id="male" name="Gender" value="Male" checked="checked" required />
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="Gender" value="Female" />
                    <label for="female">Female</label>

                    <input type="radio" id="others" name="Gender" value="Others" />
                    <label for="others">Others</label>
                </div>
                </p>

            </fieldset>
        </div>
        <div class="animatedborders">
            <fieldset>
                <!--Adress street,surburb/town text and drop down menu state, postcode text and allow 4 number-->
                <legend>Address</legend>
                <p>
                    <label for="StreetAddress">Street Address</label>
                    <input type="text" id="StreetAddress" name="Street_Address" maxlength="40" size="60"
                        required="required" placeholder="Street Address" />
                </p>
                <p>
                    <label for="SuburbTown">Suburb/Town</label>
                    <input type="text" id="SuburbTown" name="Suburb/town" maxlength="40" size="60" required="required"
                        placeholder="Suburb/Town" />
                </p>
                <p>
                    <label for="State">State</label>
                    <select name="state" id="State" required="required">
                        <option value="" disabled selected>Please Select Your State</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </p>
                <p>
                    <label for="Postcode">Post Code</label>
                    <input type="text" id="Postcode" name="Postcode" maxlength="4" size="8" required="required"
                        placeholder="Post Code" pattern="[0-9]+" />
                </p>
            </fieldset>
        </div>
        <div class="animatedborders">
            <fieldset class="skills-section" id="skills">
                <legend>Skills</legend>

                <div class="skill-item">
                    <input type="checkbox" id="Skill1" name="Skills[]" value="Team_Work" checked="checked" />
                    <label for="Skill1">Team Work</label>
                </div>

                <div class="skill-item">
                    <input type="checkbox" id="Skill2" name="Skills[]" value="Time_Management" />
                    <label for="Skill2">Time Management</label>
                </div>

                <div class="skill-item">
                    <input type="checkbox" id="Skill3" name="Skills[]" value="Communication" />
                    <label for="Skill3">Communication</label>
                </div>

                <div class="skill-item">
                    <input type="checkbox" id="Skill4" name="Skills[]" value="Problem-Solving" />
                    <label for="Skill4">Problem-Solving</label>
                </div>

                <div class="skill-item">
                    <input type="checkbox" id="Skill5" name="Skills[]" value="Adaptability" />
                    <label for="Skill5">Adaptability</label>
                </div>

                <div class="other-skills">
                    <label for="Otherskill">Other Skills</label>
                    <textarea id="Otherskill" name="Skills[]" rows="10" cols="30"
                        placeholder="Write your skills here..."></textarea>
                </div>
            </fieldset>
        </div>
        <input type="submit" value="Apply" />
        <input type="reset" value="Reset form" />
    </form>
    <?php require_once("footer.inc"); ?>
</body>

</html>
