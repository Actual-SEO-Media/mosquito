import { buildRefs } from "@/assets/scripts/helpers";

export default function (el) {
  const refs = buildRefs(el);
  const faqTabs = el.querySelectorAll(".faq-tab");
  const faqCategories = el.querySelectorAll(".faq-category");

  faqTabs.forEach(function (tab) {
    tab.addEventListener("click", function () {
      const categoryIndex = tab.getAttribute("data-category-index");

      faqTabs.forEach(function (t) {
        t.classList.remove("faq-tab-active");
      });
      tab.classList.add("faq-tab-active");

      faqCategories.forEach(function (category) {
        category.classList.remove("faq-category-active");
        if (category.getAttribute("data-category-index") === categoryIndex) {
          category.classList.add("faq-category-active");
        }
      });

      el.querySelectorAll(".faq-active").forEach(function (activeItem) {
        activeItem.classList.remove("faq-active");
        activeItem.querySelector(".faq-content").classList.remove("open");
      });
    });
  });

  el.querySelectorAll(".faq-item").forEach(function (item) {
    const title = item.querySelector(".faq-title");
    const content = item.querySelector(".faq-content");

    title.addEventListener("click", function () {
      const isActive = item.classList.contains("faq-active");
      const currentCategory = item.closest(".faq-category");

      currentCategory
        .querySelectorAll(".faq-item")
        .forEach(function (otherItem) {
          otherItem.classList.remove("faq-active");
          otherItem.querySelector(".faq-content").classList.remove("open");
        });

      if (!isActive) {
        item.classList.add("faq-active");
        content.classList.add("open");
      }
    });
  });
}
