import {Table} from "antd";
import {useEffect, useState} from "react";
import {objectHasValue} from "./helpers";

const CustomTable = (props) => {

    const [state, setState] = useState({
        columns: [],
        dataSource: []
    });

    useEffect(() => {
        if (objectHasValue(props.forecast)) {
            getForecast(props.forecast);
        }
    }, [props.forecast]);

    function getForecast(cityWeatherForecast) {
        let headers = ['City'];
        const location = cityWeatherForecast.location;
        const forecasts = cityWeatherForecast.forecast;
        let days = {'City': location.name, key: '1'};

        forecasts.forEach((forecastVal) => {
            let forecastInTime = '';
            let datetime = forecastVal.datetime;
            let condition = forecastVal.condition;
            let forecast = forecastVal.forecast;
            let day = datetime.formatted_day;
            let conditionDesc = condition.name;
            forecastInTime = `${datetime['formatted_time']} ${conditionDesc} Temp: ${forecast['temp']}K Pressure: ${forecast['pressure']}K Humidity: ${forecast['humidity']}%.`;
            headers.push(day);
            if (!Array.isArray(days[day])) {
                days[day] = [];
            }
            days[day].push(forecastInTime);
        });

        headers = [...new Set(headers)];


        headers = headers.map((header) => ({
            title: header,
            dataIndex: header.toLowerCase(),
            key: header.toLowerCase(),
        }));

        let key, keys = Object.keys(days);
        let n = keys.length;
        let newDays = {}
        while (n--) {
            key = keys[n];
            newDays[key.toLowerCase()] = days[key];
        }


        for (let [key, value] of Object.entries(newDays)) {
            if (Array.isArray(value)) {
                newDays[key] = value.slice(-1)[0];
            }
        }

        setState((prevState) => ({
            ...prevState,
            columns: headers,
            dataSource: [newDays]
        }));

        console.log(state);
    }

    return (
        <Table
            dataSource={state.dataSource}
            columns={state.columns}
            rowKey={'id'}
            pagination={false}
            size={'small'}
        />
    )
};

export default CustomTable;
