<template>
    <div class="">
        <div class="custom-date-picker-container">
            <input
                type="text"
                class="d-none"
                :name="name"
                :value="dateMoment"
            />
            <date-picker
                v-model="date"
                input-class="form-control"
                :clearable="true"
                :format="
                    type == 'date' ? 'jYYYY/jMM/jDD' : 'jYYYY/jMM/jDD HH:mm'
                "
                :display-format="
                    type == 'date' ? 'jDD jMMMM jYYYY' : 'jDD jMMMM jYYYY HH:mm'
                "
                :input-attrs="{ readonly: 'readonly' }"
                :type="type"
                color="#263143"
                append-to="body"
            />
        </div>
    </div>
</template>

<script>
import VuePersianDatetimePicker from "vue-persian-datetime-picker";
import moment from "moment-jalaali";

export default {
    components: { DatePicker: VuePersianDatetimePicker },

    props: ["name", "value", "type"],

    data() {
        return {
            date: "",
        };
    },
    computed: {
        dateMoment() {
            if (!this.date) return "";

            return this.type == "date"
                ? moment(this.date, "jYYYY/jMM/jDD").format("YYYY-MM-DD")
                : moment(this.date, "jYYYY/jMM/jDD HH:mm").format(
                      "YYYY-MM-DD HH:mm"
                  );
        },
    },
    created() {
        this.date = this.value;
    },
};
</script>
