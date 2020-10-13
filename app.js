new Vue({
  el: '#app',
  data () {
    return {
      info: null
    }
  },
  mounted () {
    axios
      // .get('https://zpay2.000webhostapp.com/api/gold.json')
      .get('https://api.coindesk.com/v1/bpi/currentprice.json')
      .then(response => (this.info = response))
      console.log(response)
  }
