import {
    createApp
} from 'vue'
import Like from './components/Like.vue'
import {
    library
} from '@fortawesome/fontawesome-svg-core'
import {
    faHeart
} from '@fortawesome/free-solid-svg-icons'
import {
    FontAwesomeIcon
} from '@fortawesome/vue-fontawesome'

library.add(faHeart)

const app = createApp(Like)
app.component('fa', FontAwesomeIcon)
app.mount('#like-area')
