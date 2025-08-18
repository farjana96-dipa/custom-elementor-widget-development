document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".dp-video-wrapper").forEach(wrapper => {
        const playIcon = wrapper.querySelector(".dp-play-icon");
        if (playIcon) {
            playIcon.addEventListener("click", function () {
                const iframe = wrapper.querySelector(".dp-video-iframe");
                let src = iframe.getAttribute("src");

                // Add autoplay param if not already present
                if (!src.includes("autoplay=1")) {
                    const joiner = src.includes("?") ? "&" : "?";
                    src += joiner + "autoplay=1";
                    iframe.setAttribute("src", src);
                }

                wrapper.classList.add("playing");
            });
        }
    });
});