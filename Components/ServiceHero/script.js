/**
 * ServiceHero component script.
 *
 * This is an optional script for enhancing the ServiceHero component with
 * interactive behaviors if needed.
 */

import { initLazyLoad } from "@/assets/scripts/utils";

export default function (el) {
  // Initialize lazy loading for images
  initLazyLoad(el);

  // Example of adding animation classes when service cards come into view
  const serviceCards = el.querySelectorAll(".service-card");

  if (serviceCards.length > 0 && "IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.1,
      }
    );

    serviceCards.forEach((card) => {
      observer.observe(card);
    });
  }
}
