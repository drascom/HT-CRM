import pandas as pd
import json
import os

# Define file paths
excel_file_path = 'public/Bookings.xlsx'
json_file_path = 'bookings.json'

# Check if the Excel file exists
if not os.path.exists(excel_file_path):
    print(f"Error: Excel file not found at {excel_file_path}")
else:
    try:
        # Read all sheets from the Excel file into a dictionary of pandas DataFrames
        excel_data = pd.read_excel(excel_file_path, sheet_name=None)

        processed_dfs = []

        for sheet_name, sheet_df in excel_data.items():
            # Extract year from sheet name (assuming format "Month YY")
            try:
                # Split sheet name by space and take the last part
                year_part = sheet_name.split()[-1]
                # Assuming '25' means 2025, '26' means 2026, etc.
                year = 2000 + int(year_part)
            except (IndexError, ValueError):
                print(f"Warning: Could not extract year from sheet name '{sheet_name}'. Skipping sheet.")
                continue # Skip this sheet if year cannot be extracted

            # Check if 'Date' column exists
            if 'Date' in sheet_df.columns:
                # Process each row to create a full date string and parse it
                processed_dates = []
                for index, row in sheet_df.iterrows():
                    date_cell_value = row['Date']
                    if pd.notna(date_cell_value): # Check if cell is not empty
                        try:
                            # Combine cell value (day and month) with extracted year
                            # Ensure date_cell_value is treated as string for combination
                            full_date_str = f"{date_cell_value} {year}"
                            # Parse the combined string. Format might be like "1 May 2025"
                            # Use errors='coerce' to turn unparseable dates into NaT (Not a Time)
                            parsed_date = pd.to_datetime(full_date_str, format='%d %b %Y', errors='coerce')
                            processed_dates.append(parsed_date)
                        except Exception as e:
                            print(f"Warning: Could not parse date '{date_cell_value}' from sheet '{sheet_name}': {e}")
                            processed_dates.append(pd.NaT) # Append NaT if parsing fails
                    else:
                         processed_dates.append(pd.NaT) # Append NaT if cell is empty

                # Replace the original 'Date' column with the processed dates
                sheet_df['Date'] = processed_dates

                # Append the processed sheet DataFrame to the list
                processed_dfs.append(sheet_df)
            else:
                print(f"Warning: 'Date' column not found in sheet '{sheet_name}'. Skipping sheet.")


        # Concatenate all processed DataFrames into a single DataFrame
        if processed_dfs:
            all_sheets_df = pd.concat(processed_dfs, ignore_index=True)
        else:
            print("Error: No sheets with a 'Date' column were processed.")
            # Depending on desired behavior, might want to exit or create empty JSON
            # For now, let's create an empty JSON if no data
            json_data = json.dumps([], indent=4) # Create empty JSON array
            # Skip the rest of the processing and write the empty JSON
            with open(json_file_path, 'w') as f:
                f.write(json_data)
            print(f"Created empty {json_file_path} as no data was processed.")
            exit() # Exit the script after creating empty file

        # Use the combined DataFrame
        df = all_sheets_df

        # Remove columns that start with "Unnamed:"
        df = df.loc[:, ~df.columns.str.startswith('Unnamed:')]

        # Convert the DataFrame to a JSON string
        # 'orient="records"' outputs a list of dictionaries, one for each row
        # Convert datetime objects to Unix timestamps (milliseconds) for JSON
        # Check if 'Date' column still exists after filtering
        if 'Date' in df.columns:
             # Convert datetime to Unix timestamp in milliseconds
             # Use errors='coerce' in case some dates are NaT after parsing
             # Let's rely on to_json's default handling for NaT which is usually null
             pass # No explicit conversion needed here, to_json handles datetime

        json_data = df.to_json(orient="records", indent=4)

        # Write the JSON data to a file
        with open(json_file_path, 'w') as f:
            f.write(json_data)

        print(f"Successfully exported data from {excel_file_path} to {json_file_path}")

    except Exception as e:
        print(f"An error occurred: {e}")