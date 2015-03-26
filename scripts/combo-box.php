

<!DOCTYPE html>
<html>
<head>
    <title></title>

    <!-- Ignite UI Required Combined CSS Files -->
    <link href="http://cdn-na.infragistics.com/igniteui/2014.2/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
    <link href="http://cdn-na.infragistics.com/igniteui/2014.2/latest/css/structure/infragistics.css" rel="stylesheet" />

    <script src="http://modernizr.com/downloads/modernizr-latest.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>

    <!-- Ignite UI Required Combined JavaScript Files -->
    <script src="http://cdn-na.infragistics.com/igniteui/2014.2/latest/js/infragistics.core.js"></script>
    <script src="http://cdn-na.infragistics.com/igniteui/2014.2/latest/js/infragistics.lob.js"></script>

</head>
<body>

    <style type="text/css">

        .label-container {
            margin: 5px 0;
        }

        span[id^="combo"] {
            margin-right: 15px;
        }

        #state, #stateCascading {
            display: none;
        }

        .group-container {
            padding: 10px;
            margin-bottom: 10px;
            clear: both;
        }

        .group-title {
            font-weight: bold;
        }

        .comboGroup {
            float: left;
        }

        .overHidden {
            overflow: hidden;
        }

    </style>

    <div class="group-container overHidden">
        <div class="group-title">Individual Data Sources</div>
        <div class="overHidden">
            <div class="comboGroup">
                <div>Country</div>
                <span id="comboCountry"></span>
            </div>
            <div class="comboGroup">
                <div id="state">State</div>
                <div id="district">District</div>
                <span id="comboDistrict"></span>
            </div>
            <div class="comboGroup">
                <div>Town</div>
                <span id="comboTown"></span>
            </div>
        </div>
    </div>
    <div class="group-container overHidden">
        <div class="group-title">Cascading Data Sources</div>
        <div class="overHidden">
            <div class="comboGroup">
                <div>Country</div>
                <span id="comboCountryCascading"></span>
            </div>
            <div class="comboGroup">
                <div id="stateCascading">State</div>
                <div id="districtCascading">District</div>
                <span id="comboDistrictCascading"></span>
            </div>
        </div>
    </div>

    <script>

        var dsCountry, dsCascTowns, dsCountryCascading,
            dsCountryCascading, dsStatesUSCascading, dsDistrictBGCascading;

        dsCountry = [
			{ txtCountry: "United States", valCountry: "US" },
			{ txtCountry: "Bulgaria", valCountry: "BG" }
        ];

        dsCascDistrict = [
			{ keyCountry: "US", txtDistrict: "New Jersey", valDistrict: "NJ" },
			{ keyCountry: "US", txtDistrict: "California", valDistrict: "CA" },
			{ keyCountry: "US", txtDistrict: "Illinois", valDistrict: "IL" },
			{ keyCountry: "US", txtDistrict: "New York", valDistrict: "NY" },
			{ keyCountry: "US", txtDistrict: "Florida", valDistrict: "FL" },
			{ keyCountry: "BG", txtDistrict: "Sofia", valDistrict: "SA" },
			{ keyCountry: "BG", txtDistrict: "Plovdiv", valDistrict: "PV" },
			{ keyCountry: "BG", txtDistrict: "Varna", valDistrict: "V" },
			{ keyCountry: "BG", txtDistrict: "Yambol", valDistrict: "Y" }
        ];

        dsCascTowns = [
			{ keyDistirct: "NJ", textTown: "Atlantic City", valTown: "AtlanticCity" },
			{ keyDistirct: "NJ", textTown: "Dover", valTown: "Dover" },
			{ keyDistirct: "CA", textTown: "Los Angeles", valTown: "LosAngeles" },
			{ keyDistirct: "CA", textTown: "San Francisco", valTown: "San Francisco" },
			{ keyDistirct: "CA", textTown: "San Diego", valTown: "SanDiego" },
			{ keyDistirct: "IL", textTown: "Chicago", valTown: "Chicago" },
            { keyDistirct: "NY", textTown: "New York", valTown: "NewYork" },
			{ keyDistirct: "NY", textTown: "Buffalo", valTown: "Buffalo" },
			{ keyDistirct: "FL", textTown: "Miami", valTown: " Miami" },
			{ keyDistirct: "FL", textTown: "Orlando", valTown: "Orlando" },
			{ keyDistirct: "SA", textTown: "Sofia", valTown: "Sofia" },
			{ keyDistirct: "SA", textTown: "Pernik", valTown: "Pernik" },
			{ keyDistirct: "PV", textTown: "Plovdiv", valTown: "Plovdiv" },
			{ keyDistirct: "PV", textTown: "Asenovgrad", valTown: "Asenovgrad" },
			{ keyDistirct: "V", textTown: "Varna", valTown: "Varna" },
			{ keyDistirct: "V", textTown: "Kavarna", valTown: "Kavarna" },
			{ keyDistirct: "V", textTown: "Balchik", valTown: "Balchik" },
			{ keyDistirct: "Y", textTown: "Yambol", valTown: "Yambol" },
			{ keyDistirct: "Y", textTown: "Kermen", valTown: "Kermen" },
			{ keyDistirct: "Y", textTown: "Elhovo", valTown: "Elhovo" },
			{ keyDistirct: "Y", textTown: "Bolyarovo", valTown: "Bolqrovo" },
        ];

        dsCountryCascading = [
            { txtCountry: "United States", valCountry: "US" },
            { txtCountry: "Bulgaria", valCountry: "BG" },
        ];

        dsStatesUSCascading = [
			{ state: "New Jersey" },
			{ state: "California" },
			{ state: "Illinois" },
			{ state: "New York" },
			{ state: "Florida" }
        ];

        dsDistrictBGCascading = [
			{ district: "Sofia" },
			{ district: "Plovdiv" },
			{ district: "Varna" },
			{ district: "Yambol" }
        ];

        dsCascStatesDistricts = {
            "US": { dataSource: dsStatesUSCascading, textKey: "state" },
            "BG": { dataSource: dsDistrictBGCascading, textKey: "district" }
        };

        $(function () {

            $("#comboCountry").igCombo({
                textKey: "txtCountry",
                selectedItems: [{ index: 1 }],
                valueKey: "valCountry",
                dataSource: dsCountry,
                selectionChanged: function (e, args) {
                    if (args.owner.selectedIndex() === 0) {
                        $("#state").css("display", "block");
                        $("#district").css("display", "none");
                    } else {
                        $("#state").css("display", "none");
                        $("#district").css("display", "block");
                    }
                }
            });

            $("#comboDistrict").igCombo({
                valueKey: "valDistrict",
                textKey: "txtDistrict",
                dataSource: dsCascDistrict,
                parentComboKey: "keyCountry",
                parentCombo: "#comboCountry"
            });

            $("#comboTown").igCombo({
                valueKey: "valTown",
                textKey: "textTown",
                dataSource: dsCascTowns,
                parentComboKey: "keyDistirct",
                parentCombo: "#comboDistrict"
            });

            $("#comboCountryCascading").igCombo({
                textKey: "txtCountry",
                valueKey: "valCountry",
                selectedItems: [{ index: 1 }],
                dataSource: dsCountryCascading,
                selectionChanged: function (e, args) {
                    if (args.owner.selectedIndex() === 0) {
                        $("#stateCascading").css("display", "block");
                        $("#districtCascading").css("display", "none");
                    } else {
                        $("#stateCascading").css("display", "none");
                        $("#districtCascading").css("display", "block");
                    }
                }
            });

            $("#comboDistrictCascading").igCombo({
                cascadingDataSources: dsCascStatesDistricts,
                parentCombo: $("#comboCountryCascading")
            });

        });

    </script>

</body>
</html>

