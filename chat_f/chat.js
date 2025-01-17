
function _(element) {
    return document.querySelector(element);
}

// LOGOUT CODE.

// buttons for logout.
const logoutBtn = _(".left-panel-logout-btn");
const logoutNo = _(".logout-btn-no");
const logoutYes = _(".logout-btn-yes");

logoutBtn.addEventListener("click", toggle_logout_popup);
logoutNo.addEventListener("click", toggle_logout_popup);

document.addEventListener("click", e => {
    if (e.target.matches(".logout-popup-wrapper")) {
        toggle_logout_popup();

    }
})



// function to show or hide the logout popup.
function toggle_logout_popup() {
    const logoutWrapper = _(".logout-popup-wrapper");
    logoutWrapper.classList.toggle("active");
    _("body").classList.toggle("no-scroll");
}

logoutYes.addEventListener("click", logout);

// function to log user out
function logout() {
    fetch("../backend/general/logout.php")
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = "../login_f/login_page.php";
        }
    })
}


// CODE TO SHOW USER INFO IN LEFT PANEL, PIC PROFILE, USERNAME AND EMAIL


// function to get user info matching username of current logged  in user.

let loggedUserInfo;

function get_logged_user_info() {

    fetch("../backend/chat_backend/get_logged_user_info.php")
    .then(res => {
        if (!res.ok) {
            throw new Error("Network response was not ok:", res.status);
        } else {
            return res.json();
        }
    })
    .then(data => {
        if (data.success) {
            loggedUserInfo = data.result;
            console.log("User data was retreived");
            console.log("user data:", loggedUserInfo); 

            // calling function to display data just retreived.
            display_user_info_in_left_panel(loggedUserInfo);
        } else {
            console.log(data.error);
        }
    })
    .catch(err => {
        console.log(err);
    })
}

get_logged_user_info();

function display_user_info_in_left_panel(userInfo) {

    const profilePicWrap = _(".user-pic-wrap");
    const usernaeEmailWrap = _(".username-email-wrap");

    // checking if user has an image profile in db, if they dont, a default image depending on their gender will be displayed.
    if (!userInfo.img) {
        console.log("No profile pic");

        profilePicWrap.innerHTML = `
            <img class="profile-pic-left-panel" src="${userInfo.gender == "male"? "../UI/ui/images/male.jpeg" : "../UI/ui/images/female.jpeg"}">
        `;
    }

    usernaeEmailWrap.innerHTML = `
        <div class="username-left-panel">${userInfo.username}</div>
        <div class="email-left-panel">${userInfo.email}</div>
    `;

}

// CODE TO SHOW SETTINGS

const settingsBtn = _(".settings-btn");
settingsBtn.addEventListener("click", show_settings);

function show_settings() {

    // grabbing and cleaning div where settings will be displayed.
    const innerLeftPanelContent = _(".inner-left-panel-content");
    innerLeftPanelContent.innerHTML = " ";

    // displaying profile picture depeding on users img

    if (!loggedUserInfo.img) {
        innerLeftPanelContent.innerHTML = `

        <div class="chage-pic-wrapper">
            <div class="settings-left-panel">
                <img src="${loggedUserInfo.gender === "male"? "../UI/ui/images/male.jpeg" : "../UI/ui/images/female.jpeg"}"
                class="settings-profile-pic">
            </div>

            <label for="change-pic-input" class="change-profile-pic-btn">Change picture</label>
            <input type="file" class="change-pic-input" id="change-pic-input" style="display:none;">
        </div>

        `;
    }

    // this line has to go inside this function just so we can trigger a function if the user selects a pic to upload
    document.querySelector(".change-pic-input").addEventListener("change", e => {
        upload_new_profile_pic(e.target.files);
    });
}


// function to upload pic to working directory and also save it to database.
async function upload_new_profile_pic(files) {

    // storing image in a form.
    let formFile = new FormData();
    formFile.append("file", files[0]);
    try {
        // sending formfile to PHP file to handle uploading process.
        const res = await fetch("../backend/chat_backend/upload_new_profile_pic.php", {
            method: "POST",
            body: formFile
        });

        if (!res.ok) {
            throw new Error("Network response was not ok:", res.status);
        }

        const data = await res.json();

        if (data.success) {
            console.log("Pic was uploaded");
            console.log("image details:", data.name);
        } else {
            console.log(data.error);
        }
    } catch(err) {
        console.log(err)
    }

    


}