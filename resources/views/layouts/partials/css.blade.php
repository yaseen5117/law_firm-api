<style>
    * {
        margin: 0;

    }

    h3 {

        color: #1cbd01;
    }

    h5 {

        color: #1cbd01;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #d8d4d4;
        border-radius: 4px;
    }

    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        max-width: 100%;
        height: auto;
    }

    html {
        height: 100%
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        padding: 20px 40px 30px 40px;

    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }

    #msform .action-button {
        width: 100px;
        background: #52C452;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 10px;
        cursor: pointer;
        float: right;
        padding: 1px 5px;
        margin: 12px 7px;
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #c813e2
    }

    #msform .action-button-previous {
        width: 100px;
        background: #3b2762b8;
        font-weight: bold;
        color: white;
        float: left;
        border: 0 none;
        border-radius: 10px;
        cursor: pointer;
        padding: 1px 5px;
        margin: 10px 5px
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #1cbd01;
    }

    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    select.list-dt:focus {
        border-bottom: 2px solid skyblue
    }

    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left
    }

    #progressbar {
        overflow: hidden;
        color: lightgray;
    }

    #progressbar .active {
        color: #1cbd01;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 16%;
        float: left;
        position: relative
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f144"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f0f7"
    }


    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d"
    }

    #progressbar #paymen:before {
        font-family: FontAwesome;
        content: "\f09d"
    }

    #progressbar #deposit:before {
        font-family: FontAwesome;
        content: "\f015 "
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }


    #progressbar li:after {
        content: '';
        width: 104%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 5px;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #1cbd01;
    }

    .form-control {
        margin-top: 20px;
        padding: 10px;
        border-radius: 10px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        margin-top: 10px !important;
    }

    .ffl-wrapper {
        position: relative;
        display: block;
        padding-top: 0rem;
        background-color: white;
    }

    .ffl-wrapper .ffl-label {
        transition-property: all;
        transition-duration: 200ms;
        transition-timing-function: ease;
        transition-delay: 0s;
        position: absolute;
        white-space: nowrap;
        max-width: 100%;
        text-overflow: ellipsis;
        overflow: hidden;
        pointer-events: none;
        top: 1rem;
        left: 10px;
    }

    .ffl-wrapper.ffl-floated .ffl-label {
        top: -11px !important;
    }


    .ffl-label {
        color: #909090;
        line-height: 1.2;
    }

    .ffl-floated .ffl-label {
        color: white;
        font-size: 18px !important;
        background-color: #3ABA41;
        padding: 2px !important;
    }

    .input:focus {
        outline: none !important;
        border: 1px solid red;
        box-shadow: 0 0 10px red;
    }

    .select2-container .select2-selection--single {
        height: 50px;
    }

    .class {

        border-color: #1cbd01 !important;
    }

    .class:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 7, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    @media only screen and (max-width: 850px) {


        #progressbar li {
            list-style-type: none;
            font-size: 11px;
            width: 14%;
            float: left;
            position: relative;
            right: 5px !important;
        }

        #progressbar li:before {
            width: 45px;
            height: 46px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0px auto 11 px auto;
            padding: 2px;
        }

        h1 {

            font-size: 32px !important;
        }

        #msform fieldset .form-card {

            position: relative;
            right: 27px !important;
        }

        .color {
            color: black;
        }
    }
    .file {
  visibility: hidden;
  position: absolute;
}
.error {      
    color: red;
}
 
 

</style>