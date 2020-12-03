<template>
    <b-container fluid>
        <b-card header="Calendar">
            <b-row>
                <b-col cols="4">
                    <form-display
                        @submitted="eventSubmitted"></form-display>
                </b-col>
                <b-col>
                    <Calendar :submitted="submitted"></Calendar>
                </b-col>
            </b-row>
        </b-card>

    </b-container>
</template>
<script>
    import FormDisplay from './Form';
    import Calendar from './Calendar';

    export default {
        components: {
            FormDisplay,
            Calendar
        },

        data() {
            return {
                submitted: false
            };
        },

        methods: {
            eventSubmitted() {
                this.submitted = true;
            }
        }
    }
</script>
