// Persist frame-box heights in localStorage so sizes survive reloads.
document.addEventListener("DOMContentLoaded", function () {
  const boxes = document.querySelectorAll(".frame-box");

  boxes.forEach((box, idx) => {
    // Attempt to find an iframe id inside this box to use as a stable key.
    const iframe = box.querySelector("iframe");
    const key =
      iframe && iframe.id ? "frame-height-" + iframe.id : "frame-height-" + idx;

    // Restore saved height (if any)
    try {
      const saved = localStorage.getItem(key);
      if (saved) {
        // allow values like '400px' or number
        box.style.height = saved;
      }
    } catch (e) {
      console.warn("Could not read saved size for", key, e);
    }

    // Save height when it changes. Use ResizeObserver to detect user resizing.
    let timeout = null;
    const saveHeight = () => {
      // store with 'px' suffix so restoration is straightforward
      const h = window.getComputedStyle(box).height;
      try {
        localStorage.setItem(key, h);
      } catch (e) {
        console.warn("Could not save size for", key, e);
      }
    };

    if (window.ResizeObserver) {
      const ro = new ResizeObserver(() => {
        // debounce
        if (timeout) clearTimeout(timeout);
        timeout = setTimeout(saveHeight, 200);
      });
      ro.observe(box);
    } else {
      // fallback: listen for mouseup on the box (end of resize)
      box.addEventListener("mouseup", () => {
        if (timeout) clearTimeout(timeout);
        timeout = setTimeout(saveHeight, 200);
      });
    }
  });
});
