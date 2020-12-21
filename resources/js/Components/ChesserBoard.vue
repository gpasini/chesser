  <script>
  import { chessboard }  from 'vue-chessboard'

  export default {
    name: 'chesserboard',
    props: ['nextMoves'],
    extends: chessboard,
    methods: {
      userPlay() {
        return (orig, dest) => {
          const isValidMove = this.nextMoves.some(nextMove => nextMove.from === orig && nextMove.to === dest)

          if (isValidMove) {
            this.game.move({from: orig, to: dest, promotion: 'q'})
          }

          this.board.set({
            fen: this.game.fen()
          })

          if (!isValidMove) {
            this.board.cancel()
          }

          // this.calculatePromotions()
          // this.aiNextMove()
        };
      },
      aiNextMove() {
        let moves = this.game.moves({verbose: true})
        let randomMove = moves[Math.floor(Math.random() * moves.length)]
        this.game.move(randomMove)

        this.board.set({
          fen: this.game.fen(),
          turnColor: this.toColor(),
          movable: {
            color: this.toColor(),
            dests: this.possibleMoves(),
            events: { after: this.userPlay()},
          }
        });
      },
    },
    mounted() {
      this.board.set({
        movable: { events: { after: this.userPlay()} },
      })
    }
  }
  </script>
