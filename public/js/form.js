
window.addEventListener("load", () => {
    const form = document.getElementById("multi-step-form");
    const formContainerBox = document.getElementById("form-container-box");
    const step2 = document.getElementById("step2");
    const step3 = document.getElementById("step3");
    const step4 = document.getElementById("step4");
    const stepGroup1 = document.getElementById("step-group-1");
    const stepGroup2 = document.getElementById("step-group-2");
    const stepGroup3 = document.getElementById("step-group-3");
    const stepGroup4 = document.getElementById("step-group-4");
    const stepNext1 = document.getElementById("step-next-1");
    const stepNext2 = document.getElementById("step-next-2");
    const stepNext3 = document.getElementById("step-next-3");
    const stepNext4 = document.getElementById("step-next-4");
    const stepPrev1 = document.getElementById("step-prev-1");
    const stepPrev2 = document.getElementById("step-prev-2");
    const stepPrev3 = document.getElementById("step-prev-3");
    const stepPrev4 = document.getElementById("step-prev-4");

    const sucessBox = document.getElementById("sucess-box");
    const ResetBtn = document.getElementById("reset-btn")

    form.addEventListener("submit", (e) => {
        e.preventDefault();
    })

    stepNext1.addEventListener("click", (e) => {
        stepGroup1.style.display = "none";
        stepGroup2.style.display = "block";
        step2.classList.add("active");
    });

    stepNext2.addEventListener("click", () => {
        stepGroup2.style.display = "none";
        stepGroup3.style.display = "block";
        step3.classList.add("active");
    });

    stepNext3.addEventListener("click", () => {
        stepGroup3.style.display = "none";
        stepGroup4.style.display = "block";
        step4.classList.add("active");
    });

    stepPrev1.addEventListener("click", () => {
        stepGroup1.style.display = "block";
        stepGroup2.style.display = "none";
        step2.classList.remove("active");
    });

    stepPrev2.addEventListener("click", () => {
        stepGroup3.style.display = "none";
        stepGroup2.style.display = "block";
        step3.classList.remove("active");
    })

    stepPrev3.addEventListener("click", () => {
        stepGroup4.style.display = "none";
        stepGroup3.style.display = "block";
        step4.classList.remove("active");
    })

    // stepPrev4.addEventListener("click", () => {
    //     stepGroup4.style.display = "none";
    //     stepGroup3.style.display = "block";
    //     step4.classList.remove("active");
    // })

    stepNext4.addEventListener("click", () => {
        formContainerBox.style.display = "none";
        sucessBox.style.display = "flex";
    });

    ResetBtn.addEventListener("click", () => {
        sucessBox.style.display = "none";
        formContainerBox.style.display = "none";
        window.location.reload();
    })


})