<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                       <Fullcalendar @eventClick="showEvent" :pulgins="calendarPulgins" :events="events" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Fullcalendar from "@fullcalendar/vue";
import FdayGridPulgin from "@fullcalendar/daygrid";
import interactionPulgin from "@fullcalendar/interaction";
import axios from "axios";
    export default {
        Compnents: {
            Fullcalendar
            
            },
            data()
            {
                return
                {

                    callendarPulgins:[
                        dayGridPulgin,interactionPulgin
                    ]
                    event:"",
                    new Event:{
                        rendezvous_desc:"",
                        start_date:"",
                        end_date:""
                    },
                    addingMode:true,
                    indexToUpdate:""
                };
            },
            created()
            {
 this.getEvents();
            },
            showEvent(arg)
            {
                this.addingMode=false;
                const{id,title,start,end}=this.events.find(
                    events=>event.id===+arg.event.id
                );          
                     this.indexToUpdate=id;
                     this.newEvent={
                         rendezvous_desc:title;
                         start_date:start;
                         end_date:end;
                     }             
                  }
        }
    }
</script>
