window.addEventListener("load", () => {
  const loader = document.querySelector(".loader");

  // Add the class to hide the loader
  loader.classList.add("loader--hidden");

  // Listen for the transition end event
  loader.addEventListener("transitionend", () => {
    // Remove the loader from the DOM
    document.body.removeChild(loader);

    // Redirect to the desired page
    window.location.href = "../views/login/index.php";
  });
});
