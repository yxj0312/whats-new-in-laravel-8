<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an another component. {{ greeting }}
                    </div>
                    <div>
                        Foo: {{ foo }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {ref} from "vue"
    export default {
        props: ['foo'],
        setup() {
            const greeting = ref('hello there')

            return {
                greeting
            }
        }
    }
</script>
