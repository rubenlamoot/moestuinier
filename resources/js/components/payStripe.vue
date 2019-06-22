<template>
    <div>
        <vue-stripe-checkout
            ref="checkoutRef"
            :image="image"
            :name="name"
            :description="description"
            :currency="currency"
            :amount="amount"
            :allow-remember-me="false"
            @done="done"
            @opened="opened"
            @closed="closed"
            @canceled="canceled"
        ></vue-stripe-checkout>
        <button @click="checkout">Betaal</button>
    </div>
</template>

<script>
    import VueStripeCheckout from 'vue-stripe-checkout';
    import axios from 'axios';

    Vue.use(VueStripeCheckout, 'pk_test_V1lcKhno0KfXhJc2bVMmTvT100HKH83sYa');

    export default {
        name: "payStripe",
        props: ['cartTotal', 'route'],
        data() {
            return {
                image: '../images/home/logo_small.png',
                name: 'De Moestuinier',
                description: 'Betaling van de bestelde producten',
                currency: 'EUR',
                amount: this.cartTotal,
            }
        },
        methods: {
            async checkout () {
                // token - is the token object
                // args - is an object containing the billing and shipping address if enabled
                const { token, args } = await this.$refs.checkoutRef.open();
            },
            done ({token, args}) {
                console.log(token);
                // token - is the token object
                // args - is an object containing the billing and shipping address if enabled
                // do stuff...
                axios.post(this.route, {
                    stripeItems: token,
                })
                    .then(response => {
                        document.location.href = '../thanks';

                    })
                    .catch(error => {
                        document.location.href = '../oeps';
                    })
            },
            opened () {
                // do stuff
            },
            closed () {
                // do stuff
            },
            canceled () {
                // do stuff
            }
        }
    }
</script>

<style scoped>

</style>
