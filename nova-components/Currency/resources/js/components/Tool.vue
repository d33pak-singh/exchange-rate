<template>
    <div>
        <heading class="mb-6">Exchange Rate</heading>

        <card
            class="bg-90 flex flex-col items-center justify-center"
            style="min-height: 300px"
        >

            <Input 
                v-model="amount"
                placeholder="Enter amount to check rate"
            />

            <div v-for="(data, key) in nameMap" class="result-block" v-if="amount">
                <p class="excahnge_by_block">
                    {{amount}} Indian Rupee = {{convertedAmount[key]}} {{data}}
                </p>
            </div>
        </card>
    </div>
</template>

<script>
import Input from './Input.vue'
export default {
    components: {
        Input
    },
    data() {
        return {
            amount: '',
            rates: [],
            nameMap: {
                EUR: "Euro",
                GBP: "Pound Sterling",
                USD: "US Dollar"
            },
            convertedAmount: []
        }
    },
    mounted() {
        this.fetchRates();
    },
    watch: {
        amount: function(val) {
            this.getConversion()
        }
    },
    methods: {
        getConversion() {
            if (this.amount) {
                Object.keys(this.nameMap).map(curr => {
                    const final = this.rates[curr].toFixed(3) * parseInt(this.amount)
                    this.convertedAmount[curr] = final.toLocaleString(undefined, { minimumFractionDigits: 2 })
                })
            } else {
                this.convertedAmount = []
            }
        },
        fetchRates() {
            Nova.request().get('/nova-vendor/currency/getRate').then(response => {
                if (response.data.succ) {
                    this.rates = response.data.result.rates
                    this.getConversion()
                }
            });
        },
    },
}
</script>

<style>
.currency-dropdown {
    width: 250px;
    margin-bottom: 20px;
}
.result-block {
    color: #fff;
}
.excahnge_by_block {
    color: rgb(161, 166, 176);
    font-weight: bold;
}
</style>
