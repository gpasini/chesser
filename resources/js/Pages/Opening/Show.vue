<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Ouverture {{ opening.name }}
      </h2>
    </template>

    <chesserboard v-if="move !== null" :next-moves="nextMoves" />
  </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Chesserboard from '@/Components/Chesserboard'
    import 'vue-chessboard/dist/vue-chessboard.css'

    export default {
        props: ['opening'],

        data() {
            return {
                move: null,
                nextMoves: [],
                previousMove: null
            }
        },

        components: {
            AppLayout,
            Chesserboard
        },

        mounted() {
            axios.get(`/api/opening/${this.opening.id}/move`)
                .then(({ data }) => {
                    this.move = data.move
                    this.nextMoves = data.nextMoves
                    this.previousMove = data.previousMove
                })
        }
    }
</script>
