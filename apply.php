<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // If not login, redirect to login page
    header("Location: login.php?error=please_login");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("header.inc"); ?>
</head>

<body class="applypage">
    <?php 
        require_once("menu.inc.php"); ?>
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
        <input type="reset" value="Reset Form" onclick="clearSessionAndReset()" />
    </form>
    <?php require_once("footer.inc"); ?>
</body>

</html>

<script>
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
</script>
