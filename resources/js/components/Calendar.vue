<template>
    <FullCalendar v-if="calendarLoaded" ref="fullCalendar"
                  :options="calendarOptions" />
</template>
<script>
    import FullCalendar from '@fullcalendar/vue';
    import dayGridPlugin from '@fullcalendar/daygrid';
    import interactionPlugin from '@fullcalendar/interaction';
    import axios from 'axios';

    export default {
        components: {
            FullCalendar
        },

        props: {
            submitted : {
                type: Boolean,
                required: true
            }
        },

        data() {
            return {
                calendarOptions: {
                    plugins: [ dayGridPlugin, interactionPlugin ],
                    initialView: 'dayGridMonth',
                },
                calendarLoaded : false
            }
        },

        mounted() {
            this.getEvents();
        },

        watch: {
            submitted(){
                this.calendarLoaded = false;

                this.getEvents();
            }
        },

        methods : {
            getEvents() {
                let calendarApi =

                axios.get('/api/events')
                    .then(response => {
                        this.calendarOptions.events =
                            response.data;
                        this.calendarLoaded = true;
                    });
            },
        }
    }
</script>
