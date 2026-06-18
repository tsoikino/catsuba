// Target the wrapper container instead of the heading
const formContainer = document.getElementById("form-container");

const openTemplate = `
<h2>
    [<a href="#" id="open-form">New Thread</a>]
</h2>
`;

const formTemplate = `
<h3 style="text-align:center;">
    <a href="#" id="close-form">Close</a>
</h3>
<form class="post-form" action="" method="POST" enctype="multipart/form-data">

<div class="form-row">
    <span class="form-label">Name</span>
    <input type="text" name="name">
</div>
<div class="form-row">
    <span class="form-label">Subject</span>
    <input type="text" name="title">
</div>
<div class="form-row">
    <span class="form-label">Password</span>
    <input type="text" name="password">
</div>
<div class="form-row">
    <span class="form-label">Tripcode</span>
    <input type="text" name="tripcap">
</div>
<div class="form-row">
    <span class="form-label">Upload</span>
    <input type="file" name="image" required>
</div>
<div class="form-row">
    <span class="form-label">Body</span>
    <textarea name="body" required></textarea>
</div>
<div class="form-row submit-row">
    <button type="submit">New Thread</button>
</div>
</form>
`;

document.addEventListener("click", (e) => {
    if (e.target.id === "open-form") {
        e.preventDefault();
        formContainer.innerHTML = formTemplate;
    }

    if (e.target.id === "close-form") {
        e.preventDefault();
        formContainer.innerHTML = openTemplate;
    }
});