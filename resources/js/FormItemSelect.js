import {Form, Select} from "antd";
import {useEffect, useState} from "react";

const FormItemSelect = (props) => {
    const [state, setState] = useState({
        options: []
    });

    useEffect(() => {
        fetch('/api/cities', {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        }).then((response) => {
            if (response.ok) {
                return response;
            }
        }).then((responseOk) => {
            return responseOk.json();
        }).then((responseJson) => {
            setState(prevState => ({
                ...prevState,
                options: responseJson
            }))
        });
    }, []);

    return (
        <Form.Item
            name={props.name}
            label={props.label}
        >
            <Select
                allowClear={true}
                showSearch={true}
                placeholder={props.placeholder}
            >
                {state.options.map((option) => {
                    return (
                        <Select.Option
                            key={option}
                            value={option}
                        >
                            {option}
                        </Select.Option>
                    )
                })}
            </Select>

        </Form.Item>
    )
}

export default FormItemSelect;
