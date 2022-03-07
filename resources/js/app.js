import '../css/app.css';
import React, {useState} from 'react';
import {render} from 'react-dom';
import {Form, Input, Button, Select, Card, Row, Col} from 'antd';
import FormItemSelect from "./FormItemSelect";
import CustomTable from "./CustomTable";

const layout = {
    labelCol: {
        span: 8,
    },
    wrapperCol: {
        span: 16,
    },
};
const tailLayout = {
    wrapperCol: {
        offset: 8,
        span: 16,
    },
};

const App = () => {
    const [form] = Form.useForm();

    const [state, setState] = useState({
        forecast: {}
    });

    const onFinish = (values) => {
        fetch(`/api/forecast/${values.city}`, {
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
                forecast: responseJson
            }))
        });
    };


    return (
        <>
            <Row gutter={[8, 8]}>
                <Col span={8} offset={8}>
                    <Card>
                        <Form
                            {...layout}
                            form={form}
                            onFinish={onFinish}
                        >
                            <FormItemSelect
                                name="city"
                                label="City"
                                placeholder="Select a city from the options"
                            />
                            <Form.Item {...tailLayout}>
                                <Button type="primary" htmlType="submit">
                                    Get forecast
                                </Button>
                            </Form.Item>
                        </Form>
                    </Card>
                </Col>
            </Row>
            <Row gutter={[8, 8]}>
                <Col span={8} offset={8}>
                    <CustomTable forecast={state.forecast}/>
                </Col>
            </Row>
        </>
    );
};


render(<App/>,
    document.getElementById('root')
)
;
