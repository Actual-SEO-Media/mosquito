import { buildRefs } from '@/assets/scripts/helpers.js'

export default function (el) {
  const refs = buildRefs(el)

  const faqTitles = refs.faq.querySelectorAll('.faq-title')

  faqTitles.forEach(function (title) {
    title.addEventListener('click', function () {
      // if (!this.parentElement.classList.contains('faq-active')) {
      //     refs.faq.querySelectorAll('.faq-item').forEach(function(item) {
      //         item.classList.remove('faq-active');
      //     });

      // }
      this.parentElement.classList.toggle('faq-active')

      const content = this.parentElement.querySelector('.faq-content')

      if (content.style.maxHeight) {
        content.style.maxHeight = null
      } else {
        content.style.maxHeight = content.scrollHeight + 'px'
      }
    })
  })
}
