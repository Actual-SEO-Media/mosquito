export default function (el) {
  const isDesktopMediaQuery = window.matchMedia("(min-width: 1024px)");
  isDesktopMediaQuery.addEventListener("change", onBreakpointChange);

  onBreakpointChange();

  function onBreakpointChange() {
    if (isDesktopMediaQuery.matches) {
      setScrollPaddingTop();
    }
  }

  function setScrollPaddingTop() {
    // Calculate total height of navigation including top bar
    const navigationWrapper = el.querySelector(".navigation-wrapper");
    const totalHeight = navigationWrapper ? navigationWrapper.offsetHeight : 0;

    // Add admin bar height if present
    const adminBarHeight = document.getElementById("wpadminbar")
      ? document.getElementById("wpadminbar").offsetHeight
      : 0;

    // Set scroll padding to account for both heights
    document.documentElement.style.scrollPaddingTop = `${
      totalHeight + adminBarHeight
    }px`;
  }
}
