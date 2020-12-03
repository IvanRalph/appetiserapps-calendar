<template>
    <b-form>
        <b-form-group
            id="event_title_group"
            label="Event"
            label-for="title"
        >
            <b-form-input
                id="title"
                type="text"
                required
                placeholder="Enter event title"
                v-model="form.title"
            ></b-form-input>
        </b-form-group>

        <b-row>
            <b-col>
                <b-form-group
                    id="event_start_group"
                    label="From"
                    label-for="event_start">
                    <b-form-datepicker id="event_start"
                                       class="mb-2"
                                       v-model="form.event_start"
                    ></b-form-datepicker>
                </b-form-group>
            </b-col>

            <b-col>
                <b-form-group
                    id="event_end_group"
                    label="To"
                    label-for="event_end">
                    <b-form-datepicker id="event_end"
                                       class="mb-2"
                    v-model="form.event_end"></b-form-datepicker>
                </b-form-group>
            </b-col>
        </b-row>

        <b-form-group >
            <b-form-checkbox-group id="checkbox-group-2" v-model="selected" name="flavour-2">
                <b-form-checkbox value="monday">Mon
                </b-form-checkbox>
                <b-form-checkbox value="tuesday">Tue
                </b-form-checkbox>
                <b-form-checkbox value="wednesday">Wed
                </b-form-checkbox>
                <b-form-checkbox value="thursday">Thur
                </b-form-checkbox>
                <b-form-checkbox value="friday">Fri
                </b-form-checkbox>
                <b-form-checkbox value="saturday">Sat
                </b-form-checkbox>
                <b-form-checkbox value="sunday">Sun
                </b-form-checkbox>
            </b-form-checkbox-group>
        </b-form-group>

        <b-alert v-model="alertShow" variant="success"
                 dismissible>
            Event successfully saved!
        </b-alert>

        <b-button variant="primary"
                  @click.prevent="submit">Save
        </b-button>
    </b-form>
</template>
<script>
    import axios from 'axios';
    export default {
        name: 'form-display',

        data() {
            return {
                form : {
                    title : '',
                    event_start : null,
                    event_end : null,
                    days: null,
                },
                selected : [],
                alertShow: false
            };
        },

        watch: {
            selected(newValue) {
                let combined = '';

                newValue.forEach(function (value) {
                    combined += value + ',';
                });

                // Remove last comma
                this.form.days = combined.slice(0, -1);
            }
        },

        methods: {
            submit() {
                axios.post('/api/events', this.form)
                    .then(response => {
                        this.alertShow = true;
                        this.$emit('submitted');
                    });
            },
        }
    }
</script>
