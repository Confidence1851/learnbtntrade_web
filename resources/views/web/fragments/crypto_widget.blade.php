<script src="https://public.bnbstatic.com/static/js/ocbs/binance-fiat-widget.js"></script>
<div id="crypto_widget"></div>
<script>
    window.onload = function () {
        var t = document.querySelector('#crypto_widget')
        window.binanceFiatWidget.Widget(t, {
            locale: 'en',
            coinInfo: {
                fiat: '',
                crypto: '',
                isInUS: false
            },
            urlParmas: {
                us_ref: 'your us refId',
                ref: '37572124'
            }
        })
    }
</script>
